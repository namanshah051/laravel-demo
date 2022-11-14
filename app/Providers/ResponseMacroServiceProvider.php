<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
        Response::macro('success', function ($data, $status = 200) {
            if(!is_array($data) || !isset($data['data'])){
                $data = ["data" => $data];
            }
            
            $data['status_code'] = 200;
            return Response::json($data, $status);
        });

        Response::macro('error', function ($message, $status = 400) {
            if(!is_array($message)){
                $message = ["message" => $message];
            }
            $message['status_code'] = 400;
            return Response::json($message, $status);
        });

        Response::macro('sucsessMessage', function ($message, $status = 200) {
            if(!is_array($message)){
                $message = ["message" => $message];
            }
            
            $message['status_code'] = 200;
            return Response::json($message, $status);
        });

    }
}
