<?php
/**
 * @Author im.phien
 * @Date   Apr 16, 2024
 */

namespace App\Transformers\Role;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RoleResource',
    properties: [
        new OA\Property(
            property: 'id', type: 'integer', example: '1',
        ),
        new OA\Property(
            property: 'name', type: 'string', example: 'Admin'
        ),
    ])]
class RoleResource extends JsonResource
{

}