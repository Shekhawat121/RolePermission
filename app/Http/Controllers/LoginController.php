<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function login(Request $request) {
        try {
            dd($request->all());
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'something went wrong');
        }
    }
}
