<?php
/**
 * @Author im.phien
 * @Date   Apr 16, 2024
 */

namespace App\Transformers\Role;

use App\Transformers\Commons\MetaResource;
use App\Transformers\Commons\SuccessCollectionResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(property: 'meta', ref: MetaResource::class),
        new OA\Property(
            property: 'data',
            type:     'array',
            items:    new OA\Items(allOf: [
                                              new OA\Schema(ref: RoleResource::class),
                                          ])
        )
    ]
)]
class RoleCollection extends SuccessCollectionResource
{

}