<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function demo()
    {
        return view('pages.demo');
    }
    public function storeDemo(Request $request)
    {
        return $request;
    }
}
