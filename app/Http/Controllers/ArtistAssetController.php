<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Asset;
use App\Models\ArtistAsset;
use App\Http\Requests\StoreArtistAssetRequest;
use App\Http\Requests\UpdateArtistAssetRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                        ->join('artist_asset as AWA', 'assets.id', '=', 'AWA.asset_id')
                        ->where([
                            ['AWA.artist_id', $_Artist],
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
            $images = Asset::join('artist_asset as AWA', 'assets.id', '=', 'AWA.asset_id')
            ->select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name','AWA.artist_id as _Artist')
            ->where([
                ['AWA.artist_id', $_Artist],
                ['assets.type', 'img'],
            ])->get();

            foreach ($images as $key => $image) {
                $image->_Artist = Crypt::encrypt($image->_Artist);
                $image->_URL = Crypt::encrypt($image->_URL);
            }


            return response()->json(["msg"=>"success","Images"=>$images]);
        } else {
            abort(404);
        }
    }
    public function deleteAsset(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_URL = Crypt::decrypt($request->_URL);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }
            // dd($_URL,$_Artist);

            $file_media = Asset::select('assets.url as URL','AWA.asset_id')
            ->join('artist_asset as AWA', 'AWA.asset_id', '=', 'assets.id')
            ->where([
                ['AWA.asset_id', $_URL],
                ['AWA.artist_id', $_Artist],
            ])
            ->first();
            // dd($file_media);
            if (!is_null($file_media)) {
                $assetId = $file_media->asset_id; // Get the asset_id
                $url = $file_media->URL; // Get the URL
                // dd($assetId,$url);
                try {
                    // Database operations and file deletion code
                    // Delete the relationship in the pivot table (artist_asset)
                    $pivotDeleted = DB::table('artist_asset')->where('asset_id', $assetId)->delete();
                    // dd($pivotDeleted);

                    // Delete the asset record from the "assets" table
                    $assetDeleted = Asset::where('id', $assetId)->forcedelete();
                    // dd($assetDeleted);

                    // Delete the asset file from the public path
                    $publicPath = public_path($url);
                    // dd($publicPath, is_file($publicPath));

                    if (is_file($publicPath)) {
                        unlink($publicPath);
                    }
                } catch (\Exception $e) {
                    // Handle the exception (e.g., log or display an error message)
                    dd($e->getMessage());
                }
                
            }

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
