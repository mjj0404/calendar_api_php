<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Google_Client;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            require_once(__DIR__ . '/../../vendor/autoload.php');
            
            $id_token = $request->bearerToken();

            $CLIENT_ID = "963527123473-f4nfg4h0j1ta0m30i9m5h2ps4vl29pvi.apps.googleusercontent.com";
            $client = new Google_Client(['client_id' => $CLIENT_ID]);
            $payload = $client->verifyIdToken($id_token);
            if ($payload) {
                $externid = $payload['sub'];
                $user = User::where('externid', $externid)->first();
                return $user;
            } else {
                return null;
            }
        });
    }
}
