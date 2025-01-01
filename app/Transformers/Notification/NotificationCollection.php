<?php
/**
 * @Author im.phien
 * @Date   Nov 24, 2024
 */

namespace App\Transformers\Notification;

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
                                              new OA\Schema(ref: NotificationResource::class),
                                          ])
        )
    ]
)]
class NotificationCollection extends SuccessCollectionResource
{

}