<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        return view ('welcome', compact('data'));
    }
    // export PDF
    public function exportPDF(){
        $data = User::orderBy('name')->get();
        $pdf = PDF::loadView('welcome',['data' => $data]);
        return $pdf -> setPaper('a4','landscape')-> download('user.pdf');
    }
}
