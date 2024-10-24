<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::post('/signin', function (Request $request) {
    $response= User::where('email', $request->input('email'))
                    ->where ('password', md5 ($request->input('password')))
                    ->count();
            
    // if (count($response)) {
    //     $request->session()->put('name', $response[0]->name);
    // }
    return $response;
});