<?php
/**
 * @Author im.phien
 * @Date   Apr 03, 2024
 */

namespace App\Transformers\User;

use App\Enums\UserSex;
use App\Transformers\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserResource',
    properties: [
        new OA\Property(
            property: 'id', type: 'integer', example: '1',
        ),
        new OA\Property(
            property: 'full_name', type: 'string', example: 'Pham Van Tien', nullable: true
        ),
        new OA\Property(
            property: 'phone', type: 'string', example: '01234567889', nullable: true
        ),
        new OA\Property(
            property: 'birthday',
            type: 'string',
            example: '13-08-2000'
        ),
        new OA\Property(
            property:    'sex',
            description: '0:Male, 1:Female',
            type:        'integer',
            enum: UserSex::class,
            example: 0,
            nullable: true
        ),
        new OA\Property(
            property: 'email',
            type: 'string',
            example: 'example@gmail.com',
        ),
        new OA\Property(
            property: 'address', type: 'string', example: 'Ha Noi',
        ),
        new OA\Property(
            property: 'account_balance', type: 'string', example: '19036101739010',
        ),
        new OA\Property(
            property: 'roles',
            type:     'array',
            items:    new OA\Items(allOf: [
                                              new OA\Schema(ref: RoleResource::class),
                                          ])
        )
    ])]
class UserResource extends JsonResource
{

}