<?php

namespace App\Http\Controllers;

use App\Models\Asset;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class AssetController extends Controller
{
    public function index(){
        return view('dashboard.assets.index');
    }
    public function list(Request $request){
        if ($request->ajax()) {
            // dd($request->all());
            
            // dd($_Artist);
            $images = Asset::select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name','assets.description as Description','assets.created_at as Created')
            ->where('assets.type', $request->type)
            ->orderBy('Created', 'desc')
            ->get();
            
            foreach ($images as $key => $image) {
                $image->_URL = Crypt::encrypt($image->_URL);
            }


            return response()->json(["msg"=>"success","Images"=>$images]);
        } else {
            abort(404);
        }
    }

    public function storeAsset(Request $request) {
        if ($request->ajax()) {
            // dd($request->all());

            if ($request->hasFile('file')) {
                //  Let's do everything here
                if ($request->file('file')->isValid()) {
                    $validated = $request->validate([
                        'file' => 'required|image|mimes:webp,jpeg,png,jpg,svg|max:10240',
                    ]);
        
                    $asset = new Asset;
                    $asset->url = '';
                    $asset->name = $request->file->getClientOriginalName();
                    $asset->type = 'img';
                    $asset->save();
                    // dd($asset->id);
                    $originalFileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

                    $folderReal = public_path('assets/tattoos/');
                    $folderHost = URL::to('assets/tattoos/');
                    // $fileName = $uniqueName;
                    $fileName = $originalFileName . '-' . $asset->id . '.' . $request->file->extension();
                    // dd($fileName);
                    $request->file->move($folderReal, $fileName);

                    $asset->url = $folderHost.'/'.$fileName;
                    $asset->update();

                    $images = Asset::select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name','assets.description as Description')
                    ->where('assets.type', 'img')->get();
                    foreach ($images as $key => $image) {
                        $image->_URL = Crypt::encrypt($image->_URL);
                    }
                    // $images->_URL = Crypt::encrypt($file->_URL);
                    return response()->json(["msg"=>"success","content"=>"File uploaded.","Images"=>$images]);
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
            
            // dd($_Artist);
            $images = Asset::select('assets.id as _URL', 'assets.url as URL', 'assets.name as Name','assets.description as Description','assets.created_at as Created')
            ->where('assets.type', $request->type)
            ->orderBy('Created', 'desc')
            ->get();
            
            foreach ($images as $key => $image) {
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
            // dd($_URL,$_Artist);

            $file_media = Asset::select('assets.url as URL','assets.id as _URL')
            ->where('assets.id', $_URL)
            ->first();
            
            // dd($file_media);
            if (!is_null($file_media)) {
                $assetId = $file_media->_URL; // Get the asset_id
                $url = $file_media->URL; // Get the URL
                
               // Split the URL by the constant "/assets"
                $urlParts = explode('/assets', $url);
                // dd($urlParts);
                if (count($urlParts) > 1) {
                    // The second part of the exploded URL is the relative file path
                    $relativeFilePath = '/assets' . $urlParts[1];
                    // dd($relativeFilePath);

                    // Combine the relative file path with the public path
                    $publicPath = public_path($relativeFilePath);
                    // dd( $publicPath);

                    if (is_file($publicPath)) {
                        // File exists in the public path, delete it
                        unlink($publicPath);
                        

                        // Delete the relationship in the pivot table (artist_asset)
                        // DB::table('artist_asset')->where('asset_id', $assetId)->delete();

                        // Delete the asset record from the "assets" table
                        Asset::where('id', $assetId)->forcedelete();
                        
                    }
                }
                
            }

            return response()->json(["msg"=>"success"]);

        } else {
            abort(404);
        }
    }
}
