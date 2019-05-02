<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public $redirectTo = '/';

    protected $registeredOauthProviders = ['facebook', 'google'];
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }


    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {

        $authUser = User::where('user_provider_id', $user->id)->orWhere('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }


        if( in_array($provider, $this->registeredOauthProviders)){
           return $this->createUser($user,$provider);
        }

    }

    public function createUser($user,$provider){

             $name = explode(' ',$user->name);
             $firstName = $name[0];
             $lastName =  $name[1];
             $username = "$firstName.$lastName";
             $avatar = $user->avatar ;
             $email = $user->email ;

            return User::create([
                'username'     => $username,
                'avatar'       => $avatar,
                'first_name'    => $firstName,
                'last_name'     => $lastName,
                'email'        => $email,
                'provider'     => $provider,
                'user_provider_id' => $user->id,
                'role_id'   => 2
            ]);

    }


}
