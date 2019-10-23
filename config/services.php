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

    'firebase' => [
        "type"=> "service_account",
        "project_id"=> env("FIREBASE_PROJECTID"),
        "private_key_id"=> env("FIREBASE_PRIVATEID"),
        "private_key"=> str_replace("\\n","\n",env("FIREBASE_PRIVATEKEY")),
        "client_email"=> env("FIREBASE_CLIENTEMAIL"),
        "client_id"=> env("FIREBASE_CLIENTID"),
        "auth_uri"=> "https://accounts.google.com/o/oauth2/auth",
        "token_uri"=> "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url"=> "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url"=> env("FIREBASE_X509CERTURL")
    ],
];
