<?php

use Kostyap\JwtAuth\Enum\AccessTokenSource;
use Kostyap\JwtAuth\Enum\RefreshTokenSource;
use Kostyap\JwtAuth\Enum\RefreshTokenStorage;
use Kostyap\JwtAuth\Jwt\Generation\JWTSigner;

return [
    'secret' => env('JWT_SECRET'),

    'keys' => [
        'public' => env('JWT_PUBLIC_KEY'),
        'private' => env('JWT_PRIVATE_KEY'),
    ],

    'algo' => env('JWT_ALGO', JWTSigner::ALGO_HS256),

    'required_claims' => [
        'iss',
        'iat',
        'exp',
        'nbf',
        'sub',
        'jti',
    ],

    'ttl' => env('JWT_TTL', 60),

    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160),

    'token_source' => [
        'access_token' => AccessTokenSource::Bearer,

        'refresh_token' => RefreshTokenSource::Cookie,

        'refresh_token_storage' => RefreshTokenStorage::Database,
    ]
];
