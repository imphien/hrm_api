<?php
/**
 * @Author im.phien
 * @Date   Jun 24, 2024
 */

namespace App\Transformers\Recruitment;

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
                                              new OA\Schema(ref: RecruitmentResource::class),
                                          ])
        )
    ]
)]
class RecruitmentsCollection extends SuccessCollectionResource
{

}