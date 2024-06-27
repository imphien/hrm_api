<?php
/**
 * @Author im.phien
 * @Date   Apr 15, 2024
 */

namespace App\Http\Requests\User;

use App\Enums\UserSex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UpdateUserRequest',
    required: ['data'],
    properties: [
        new OA\Property(
            property: 'full_name',
            description: 'User full_name',
            type: 'string',
            example: 'Pham Van Tien',
            nullable: true,
        ),
        new OA\Property(
            property: 'phone',
            description: 'User phoen',
            type: 'string',
            example: '0123456789',
            nullable: true,
        ),
        new OA\Property(
            property: 'birthday',
            description: 'User birthday',
            type: 'string',
            example: '13-08-2000',
            nullable: true
        ),
        new OA\Property(
            property: 'email',
            description: 'User email',
            type: 'string',
            example: 'example@gmail.com',
            nullable: true
        ),
        new OA\Property(
            property: 'role_id',
            description: 'Role user id',
            type: 'integer',
            example: '1',
            nullable: true
        ),
        new OA\Property(
            property: 'username',
            description: 'User username',
            type: 'string',
            example: 'phien',
            nullable: true
        ),
        new OA\Property(
            property: 'password',
            description: 'User password',
            type: 'string',
            example: 'Pa55w0rd',
            nullable: true
        ),
        new OA\Property(
            property: 'sex',
            description: 'MALE:0, FEMALE:1',
            type: 'integer',
            enum: UserSex::class,
            example: '0',
            nullable: true
        ),
        new OA\Property(
            property: 'is_block',
            description: 'Block user',
            type: 'boolean',
            example: true,
            nullable: true
        ),
    ],
    type: 'object',
)]
class UpdateRequest extends FormRequest
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Apr 15, 2024
     *
     * @return array
     */
    #[ArrayShape(['full_name' => "string[]", 'phone' => "string[]", 'birthday' => "string[]", 'sex' => "array", 'email' => "string[]", 'role_id' => "string[]", 'username' => "string[]", 'password' => "string[]", 'is_block' => "string[]"])]
    public function rules(): array
    {
        return [
            'full_name' => ['nullable', 'string'],
            'phone' => ['nullable, string'],
            'birthday' => ['nullable, string'],
            'sex' => ['nullable', new Enum(CreateRequest::class)],
            'email' => ['nullable', 'email'],
            'role_id' => ['nullable', 'exists:roles, id'],
            'username' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'is_block' => ['nullable', 'boolean']
        ];
    }
}