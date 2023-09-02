<?php

namespace App\Http\Controllers;

use App\Models\Artist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArtistRequest;

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
            $artists = DB::table('artists')
            ->select('id as _Artist','name as Name','last_name as LastName','email as Email','phone_number as Phone','created_at as Created')
            ->where('deleted_at','=',null)
            ->orderBy('Created','desc')
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
            $artist = (new Artist)->fill($request->validated());
            $artist->save();

            return response()->json(["message"=>"Success", "artist"=>$artist], 200);

        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
