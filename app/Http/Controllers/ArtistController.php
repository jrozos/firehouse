<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ArtistController extends Controller
{
    public function artistCarlos(){
        return view('admin.artists.carlos');
    }
    public function artistAida(){
        return view('admin.artists.aida');
    }
    public function artistMario(){
        return view('admin.artists.mario');
    }
    public function artistLukas(){
        return view('admin.artists.lukas');
    }
    public function artistRekzone(){
        return view('admin.artists.rekzone');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('dashboard.artists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request){
        if ($request->ajax()) {
            $artists = DB::table('artists as ART')
            ->leftJoin('users as createdByUser', 'createdByUser.id', '=', 'ART.created_by')
            ->leftJoin('users as updatedByUser', 'updatedByUser.id', '=', 'ART.updated_by')
            ->select('ART.id as _Artist','ART.name as Name','ART.last_name as LastName','ART.email as Email','ART.phone_number as Phone','ART.description as Description','ART.instagram as Instagram','ART.created_at as Created','ART.updated_at as Updated','createdByUser.name as CreatedBy', 
            'updatedByUser.name as UpdatedBy')
            ->whereNull('ART.deleted_at') // Use whereNull to check for null in deleted_at
            ->orderBy('Sort', 'asc')
            ->get();
            
            foreach ($artists as $key => $artist) {
                $artistModel = Artist::find($artist->_Artist);
                $artist->_Artist = Crypt::encrypt($artist->_Artist);
            }
            return response()->json(["message"=>"Success", "artists"=>$artists], 200);

        } else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request){
        if ($request->ajax()) {
            // dd($request);
            $validatedData = $request->validated();
            $artist = (new Artist)->fill($validatedData);
            $artist->save();

            return response()->json(["message"=>"Success", "artist"=>$artist], 200);

        } else {
            abort(404);
        }
    }
    
    public function edit(Request $request){
        if ($request->ajax()) {
            // dd($request->_Artist);
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["message"=>"error", "title"=>"", "content"=>"Ha ocurrido un error, intente recargar la página."]);
            }
            
            $artist = Artist::where('id',$_Artist)
            ->select('id as _Artist','name as Name','last_name as LastName','email as Email','phone_number as Phone','description as Description','instagram as Instagram','sort as Sort')
            ->first();

            
            $artist->_Artist = Crypt::encrypt($artist->_Artist);
            

            return response()->json(["message"=>"Success", "artist"=>$artist], 200);

        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        if ($request->ajax()) {
            // dd($request);
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["message"=>"error", "title"=>"", "content"=>"Ha ocurrido un error, intente recargar la página."]);
            }
            
            $artist = Artist::where('id',$_Artist)->first();

            
            $artist->name = $request->name;
            $artist->last_name = $request->last_name;
            $artist->email = $request->email;
            $artist->phone_number = $request->phone_number;
            $artist->description = $request->description;
            $artist->instagram = $request->instagram;
            $artist->sort = $request->sort;
            
            $artist->update();
            

            return response()->json(["message"=>"Success", "artist"=>$artist], 200);

        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        if ($request->ajax()) {
            // dd($request->_Artist);
            try {
                $_Artist = Crypt::decrypt($request->_Artist);
            } catch (DecryptException $e) {
                return response()->json(["message"=>"error", "title"=>"", "content"=>"Ha ocurrido un error, intente recargar la página."]);
            }
            
            $artist = Artist::where('id',$_Artist)->first();

            
            $artist->delete();
            

            return response()->json(["message"=>"Success"], 200);

        } else {
            abort(404);
        }
    }
}
