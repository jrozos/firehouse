<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Asset;
use App\Models\ArtistAsset;
use App\Http\Requests\StoreArtistAssetRequest;
use App\Http\Requests\UpdateArtistAssetRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ArtistAssetController extends Controller
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
     * @param  \App\Http\Requests\StoreArtistAssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistAssetRequest $request)
    {
        //
    }
    public function storeAsset(Request $request) {
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
            // Tal vez ya no se use
            // $file = ArtistAsset::where([
            //         ['artist_id',$_Artist],
            //     ])->count();
            // if ($file >= 1) {
            //     abort( response()->json(["errors"=>[
            //         'file'=>[
            //             'Ya no puedes agregar más archivos | Max a file.'
            //         ]
            //     ], "message"=>"Ha ocurrido un error, intente recargar la página."], 422) );
            // }

            if ($request->hasFile('file')) {
                //  Let's do everything here
                if ($request->file('file')->isValid()) {
                    $validated = $request->validate([
                        'file' => 'required|image|mimes:jpeg,png,jpg,svg|max:10240',
                    ]);
                    $artist = Artist::select('name')->where('id',$_Artist)->first();
                    // dd($artist);
        
                    if (!is_null($artist)) {
                        $asset = new Asset;
                        $asset->url = '';
                        $asset->alt = $artist->name;
                        $asset->name = $request->file->getClientOriginalName();
                        $asset->type = 'img';
                        $asset->save();

                        $asset->artists()->attach($_Artist);
                        // dd($asset->id);
                    
                        $folderReal = public_path('assets/artists/'.$artist->name.'/profile');
                        $folderHost = URL::to('assets/artists/'.$artist->name.'/profile');
                        $fileName = $request->file->getClientOriginalName();
                        // $fileName = $request->file->getClientOriginalName().$asset->id.$request->file->extension();
                        // dd($fileName);
                        $request->file->move($folderReal, $fileName);

                        $asset->url = $folderHost.'/'.$fileName;
                        $asset->update();

                        $images = Asset::select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name')
                        ->join('artist_asset as AWM', 'assets.id', '=', 'AWM.asset_id')
                        ->where([
                            ['AWM.artist_id', $_Artist],
                            ['assets.type', 'img'],
                        ])->get();
                        foreach ($images as $key => $image) {
                            $image->_URL = Crypt::encrypt($image->_URL);
                        }
                        // $images->_URL = Crypt::encrypt($file->_URL);
                        return response()->json(["msg"=>"success","content"=>"File uploaded.","Images"=>$images]);
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
     * @param  \App\Models\ArtistAsset  $artistAsset
     * @return \Illuminate\Http\Response
     */
    public function show(ArtistAsset $artistAsset)
    {
        //
    }
    public function showAsset(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }
            $images = [];
            // dd($_Artist);
            $images = Asset::select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name')
            ->join('artist_asset as AWM', 'assets.id', '=', 'AWM.asset_id')
            ->where([
                ['AWM.artist_id', $_Artist],
                ['assets.type', 'img'],
            ])->get();

            foreach ($images as $key => $image) {
                $image->artist_id = Crypt::encrypt($image->artist_id);
                $image->_URL = Crypt::encrypt($image->_URL);
            }


            return response()->json(["msg"=>"success","Images"=>$images]);
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

            $file_media = ArtistAsset::select('id', 'url as URL')->where([
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
     * @param  \App\Models\ArtistAsset  $artistAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtistAsset $artistAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistAssetRequest  $request
     * @param  \App\Models\ArtistAsset  $artistAsset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistAssetRequest $request, ArtistAsset $artistAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtistAsset  $artistAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtistAsset $artistAsset)
    {
        //
    }
}
