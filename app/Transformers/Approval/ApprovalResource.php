<?php
/**
 * @Author im.phien
 * @Date   Nov 24, 2024
 */

namespace App\Transformers\Approval;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RecruitmentResource',
    properties: [
        new OA\Property(
            property: 'id', type: 'integer', example: '1',
        ),
        new OA\Property(
            property: 'start_date', type: 'string', example: '2022-10-11'
        ),
        new OA\Property(
            property: 'end_date', type: 'string', example: '2022-10-11'
        ),
        new OA\Property(
            property: 'type',
            type: 'integer',
            example: '1'
        ),
        new OA\Property(
            property:    'status',
            type: 'integer',
            example: '1'
        ),
        new OA\Property(
            property: 'user_id',
            type: 'integer',
            example: '1',
        ),
    ])]
class ApprovalResource extends JsonResource
{

}