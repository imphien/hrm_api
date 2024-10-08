<?php
/**
 * @Author im.phien
 * @Date   Mar 20, 2024
 */

namespace App\Transformers\Auth;

use App\Transformers\Commons\MetaResource;
use App\Transformers\Commons\SuccessResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(property: 'meta', ref: MetaResource::class),
        new OA\Property(
            property: 'data',
            properties: [
                          new OA\Property(
                              property: 'token',
                              type: 'string',
                              example: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMDI4My0zNC0yMTktMTQ0LTE0Ni5uZ3Jvay5pby9hcGkvbG9naW4iLCJpYXQiOjE2NjY5Mzg4MTEsImV4cCI6MTY2Njk0MjQxMSwibmJmIjoxNjY2OTM4ODExLCJqdGkiOiJ1N1dYV3JKSFBxSjZ3dXA0Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJndWFyZCI6ImFwaSJ9.JRbvzCNv1CCxp1CbDuD6HefKO072eoFPNGjEP_aQiKo',
                          ),
                          new OA\Property(
                              property: 'expires_in',
                              description: 'Amount of time in seconds until the access token expires',
                              type: 'integer',
                              example: '2592',
                          ),
                      ],
            type: 'object',
        ),
    ],
)]
class LoginResource extends SuccessResource
{

}