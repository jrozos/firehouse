<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistsController extends Controller
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
}
