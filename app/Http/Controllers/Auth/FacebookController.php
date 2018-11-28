<?php


namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;


class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['national_id'] = '123456';
            $create['password'] = '123456';
            dd($user);
            $create['facebook_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->create($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('posts');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}