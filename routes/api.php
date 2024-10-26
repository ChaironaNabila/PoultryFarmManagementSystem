<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::group(['middleware'=>['web']], function (){
    Route::post('/signin', function (Request $request) {
        $response= User::where('email', $request->input('email'))
                        ->where ('password', md5 ($request->input('password')))
                        ->get();
        if (count ($response)) {
            $request->session()->put('name', $response [0]->name);
        }
        return count ($response);
    });

});

