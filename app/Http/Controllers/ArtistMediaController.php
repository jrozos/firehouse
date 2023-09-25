<?php

namespace App\Http\Controllers;

use App\Models\ArtistMedia;
use App\Http\Requests\StoreArtistMediaRequest;
use App\Http\Requests\UpdateArtistMediaRequest;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ArtistMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistMediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistMediaRequest $request)
    {
        //
    }
    public function storeMedia(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                abort( response()->json(["errors"=>[
                    'file'=>[
                        'Ha ocurrido un error, intente recargar la página.'
                    ]
                ], "message"=>"No se encontro el usuario"], 422) );
            }
            // dd($_Artist);

            $file = ArtistMedia::where([
                    ['artist_id',$_Artist],
                    ['type','image'],
                ])->count();
            // dd($file);
            if ($file >= 1) {
                abort( response()->json(["errors"=>[
                    'file'=>[
                        'Ya no puedes agregar más archivos | Max a file.'
                    ]
                ], "message"=>"Ha ocurrido un error, intente recargar la página."], 422) );
            }

            if ($request->hasFile('file')) {
                //  Let's do everything here
                if ($request->file('file')->isValid()) {
                    $validated = $request->validate([
                        'file' => 'required|mimes:pdf|max:204800',
                    ]);
                    $user = User::select('email')->where('id',$_Artist)->first();
                    // dd($user);
        
                    if (!is_null($user)) {
                        $newV = new ArtistMedia;
                        $newV->user_id = $_Artist;
                        $newV->url = '';
                        $newV->name = $request->file->getClientOriginalName();
                        $newV->type = 'file';
                        $newV->save();
                        // dd($newV->id);
                    
                        $folderReal = public_path('documents/users/'.$user->email.'/files');
                        $folderHost = URL::to('documents/users/'.$user->email.'/files');
                        $fileName = $newV->id.'_'.$request->file->getClientOriginalName();
                        // $fileName = $request->file->getClientOriginalName().$newV->id.$request->file->extension();
                        // dd($fileName);
                        $request->file->move($folderReal, $fileName);

                        $newV->url = $folderHost.'/'.$fileName;
                        $newV->update();

                        $files = ArtistMedia::select('id as _URL', 'url as URL','name as Name')->where([
                            ['user_id',$_Artist],
                            ['type','file'],
                        ])->get();
                        foreach ($files as $key => $file) {
                            $file->_URL = Crypt::encrypt($file->_URL);
                        }
                        // $files->_URL = Crypt::encrypt($file->_URL);
                        return response()->json(["msg"=>"success","content"=>"File uploaded.","Files"=>$files]);
                    } else {
                        abort( response()->json(["errors"=>[
                            'file'=>[
                                'Usuario no encontrado.'
                            ]
                        ], "message"=>"Ha ocurrido un error, intente recargar la página."], 422) );
                    }
                }
            }
            abort( response()->json(["errors"=>[
                'file'=>[
                    'Usuario no encontrado.'
                ]
            ], "message"=>"Ha ocurrido un error, intente recargar la página."], 422) );

        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtistMedia  $artistMedia
     * @return \Illuminate\Http\Response
     */
    public function show(ArtistMedia $artistMedia)
    {
        //
    }
    public function showMedia(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }
            $images = [];
            $video = null;
            // dd($_Artist);

            switch ($request->type) {
                case 'both':
                    $images = ArtistMedia::select('id as _URL', 'url as URL', 'name as Name')->where([
                        ['user_id',$_Artist],
                        ['type','img'],
                    ])->get();

                    $files = ArtistMedia::select('id as _URL', 'url as URL', 'name as Name')->where([
                        ['user_id',$_Artist],
                        ['type','file'],
                    ])->get();
                    break;
                case 'image':
                    $images = ArtistMedia::select('id as _URL', 'url as URL', 'name as Name')->where([
                        ['user_id',$_Artist],
                        ['type','img'],
                    ])->get();
                    break;
                case 'file':
                    $files = ArtistMedia::select('id as _URL', 'url as URL', 'name as Name')->where([
                        ['user_id',$_Artist],
                        ['type','file'],
                    ])->get();
                    break;
            }

            foreach ($files as $key => $file) {
                $file->user_id = Crypt::encrypt($file->user_id);
                $file->_URL = Crypt::encrypt($file->_URL);
            }


            return response()->json(["msg"=>"success","Files"=>$files]);
        } else {
            abort(404);
        }
    }
    public function deleteMedia(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_media = Crypt::decrypt($request->array[0]);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }

            $file_media = ArtistMedia::select('id', 'url as URL')->where([
                ['id',$_media],
                ['type',$request->array[2]],
            ])->first();
            // dd($file_media);

            if (!is_null($file_media)) {
                $url = 'documents'.explode('/documents', $file_media->URL)[1];
                // dd($url);
                if (is_file( public_path($url) )) {
                    // dd('entro');
                    if(file_exists($url)) {
                        unlink($url);
                    }
                    // @unlink($url);
                }
                $file_media->forceDelete();
            }

            // public_path('media\villas\\'.$villa->name.'\video');

            return response()->json(["msg"=>"success", "content"=>"Success Operations."]);

        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtistMedia  $artistMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtistMedia $artistMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistMediaRequest  $request
     * @param  \App\Models\ArtistMedia  $artistMedia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistMediaRequest $request, ArtistMedia $artistMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtistMedia  $artistMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtistMedia $artistMedia)
    {
        //
    }
}
