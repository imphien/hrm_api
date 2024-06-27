<?php
/**
 * @Author im.phien
 * @Date   Jun 24, 2024
 */

namespace App\Transformers\Recruitment;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RecruitmentResource',
    properties: [
        new OA\Property(
            property: 'id', type: 'integer', example: '1',
        ),
        new OA\Property(
            property: 'position', type: 'string', example: 'Developer'
        ),
        new OA\Property(
            property: 'quantity', type: 'number', example: '1'
        ),
        new OA\Property(
            property: 'content',
            type: 'string',
            example: 'Intern'
        ),
        new OA\Property(
            property:    'requirement',
            type: 'string',
            example: 'Has experience'
        ),
        new OA\Property(
            property: 'email',
            type: 'string',
            example: 'example@gmail.com',
        ),
        new OA\Property(
            property: 'expired', type: 'string', example: '13-08-2024',
        ),
    ])]
class RecruitmentResource extends JsonResource
{

}