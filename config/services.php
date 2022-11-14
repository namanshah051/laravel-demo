<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '568756358037540',  // Your Facebook App ID
        'client_secret' => '7dbedc65a368c8a5ceef8c7fd55be2d2', // Your Facebook App Secret
        'redirect' => env('APP_URL').'api/login/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => '77ka3i5axgmxp2',  // Your Linked In App ID
        'client_secret' => 'UKERvQPbkvv4GZvr', // Your Linked In App Secret
        'redirect' => 'https://johncodes.com/login/callback',
    ],
    'google' => [
        'client_id' => '474234732303-a87octmmg90dt4eb79sjtfrke3mi36r2.apps.googleusercontent.com', //google API
        'client_secret' => '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', //google Secret
        'redirect' => env('APP_URL').'api/login/google/callback',
    ],
    "apple" => [
            "client_id" => "com.maf.Jobsapp",
            "client_secret" => "eyJraWQiOiJGUTQzU0o0R1dHIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJLNEY3UFBBWEpHIiwiYXVkIjoiaHR0cHM6Ly9hcHBsZWlkLmFwcGxlLmNvbSIsInN1YiI6ImNvbS5tYWYuSm9ic2FwcCIsImlhdCI6MTYzNzkxMDIxMSwiZXhwIjoxNjUzNDYyMjExfQ.2R6jtpUXQ7j5KiX3_hsv31M4-OLxsty_ezLNH5B9KYqeFA55twPHzUfPzgZ2y9oyuNfyHLMLf_Vkt0R67FLS8w",
            'redirect' => env('APP_URL').'api/login/apple/callback',
        ],

         /*
     * Add the Firebase API key
     */
    'fcm' => [
        'key' => "AAAAUhUSIbU:APA91bGaM17gmi7N24jw_7GUKyuCQ-P7xqYPh1eh5Vey1FZMkbvZrP29RkI0Uck-TsBkmyc6xjjd4yu_SwUnesiBo6YUOolFoZMWncmsoMAz8cIJqzyiy81edVG7LfpBoldnG2CRyn4c",
     ]


];
