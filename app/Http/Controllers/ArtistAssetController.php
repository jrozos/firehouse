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
                        $asset->description = $artist->name;
                        $asset->name = $request->file->getClientOriginalName();
                        $asset->type = 'profile';
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
                            ['assets.type', 'profile'],
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

    public function showAsset(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["msg"=>"error", "title"=>"", "content"=>"An error has occured, try reloading the page."]);
            }
            
            // dd($_Artist);
            $images = Asset::join('artist_asset as AWA', 'assets.id', '=', 'AWA.asset_id')
            ->select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name','AWA.artist_id as _Artist')
            ->where([
                ['AWA.artist_id', $_Artist],
                ['assets.type', $request->type],
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
                
               // Split the URL by the constant "/assets"
                $urlParts = explode('/assets', $url);

                if (count($urlParts) > 1) {
                    // The second part of the exploded URL is the relative file path
                    $relativeFilePath = '/assets' . $urlParts[1];

                    // Combine the relative file path with the public path
                    $publicPath = public_path($relativeFilePath);

                    if (is_file($publicPath)) {
                        // File exists in the public path, delete it
                        unlink($publicPath);

                        // Delete the relationship in the pivot table (artist_asset)
                        DB::table('artist_asset')->where('asset_id', $assetId)->delete();

                        // Delete the asset record from the "assets" table
                        Asset::where('id', $assetId)->forcedelete();
                        
                        $images = Asset::select('assets.url as URL','AWA.asset_id')
                        ->join('artist_asset as AWA', 'AWA.asset_id', '=', 'assets.id')
                        ->where([
                            ['AWA.asset_id', $_URL],
                            ['AWA.artist_id', $_Artist],
                        ])
                        ->first();
                    }
                }
                
            }

            return response()->json(["msg"=>"success","Images"=>$images]);

        } else {
            abort(404);
        }
    }
}
