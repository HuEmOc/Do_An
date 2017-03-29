<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
     public function redirect()
     {
         return Socialite::driver('facebook')->redirect();
     }
    public function callback(SocialAccountService $service)
    {
        //dd(Socialite::driver('facebook')->user());
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        Auth::login($user);
        return redirect()->to('/home');
    }
}
