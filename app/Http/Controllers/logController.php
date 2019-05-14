<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class logController extends Controller
{


    public function login(Request $request){
        
        if(
        Auth::attempt([
            'email' => $request -> email,
            'password' => $request -> password
            
            ])
        ){
           $user = user::where('email', $request -> email) -> first();

           if($user -> is_admin())
           {
               return redirect()->route('/adminHome');
           }
           return redirect()->route('/index');
        }

        
        return redirect()->back();
        
    }

    
}
