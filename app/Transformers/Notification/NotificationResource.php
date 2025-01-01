<?php
/**
 * @Author im.phien
 * @Date   Nov 24, 2024
 */

namespace App\Transformers\Notification;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'NotificationResource',
    properties: [
        new OA\Property(
            property: 'id', type: 'integer', example: '1',
        ),
        new OA\Property(
            property: 'start_date', type: 'string', example: '2022-19-10'
        ),
        new OA\Property(
            property: 'end_date', type: 'string', example: '2022-19-19'
        ),
        new OA\Property(
            property: 'content',
            type: 'string',
            example: 'Lich nghi tet'
        ),
    ])]
class NotificationResource extends JsonResource
{

}