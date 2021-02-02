<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccAccountController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	//$accaccount = DB::table('accaccount')->get();
 
    	// mengirim data pegawai ke view index
        //return view('index',['accaccount' => $accaccount]);
        return view('create');
    }
}
