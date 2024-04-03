<?php
/**
 * @Author im.phien
 * @Date   Apr 03, 2024
 */

namespace App\Http\Requests\User;

use App\Enums\UserSex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CreateUserRequest',
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
        ),
        new OA\Property(
            property: 'username',
            description: 'User username',
            type: 'string',
            example: 'phien',
        ),
        new OA\Property(
            property: 'password',
            description: 'User password',
            type: 'string',
            example: 'Pa55w0rd',
        ),
        new OA\Property(
            property: 'User sex',
            description: 'MALE:0, FEMALE:1',
            type: 'integer',
            enum: UserSex::class,
            example: '0',
        ),
    ],
    type: 'object',
)]
class CreateRequest extends FormRequest
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Apr 03, 2024
     *
     * @return array
     */
    #[ArrayShape(['full_name' => "string[]", 'phone' => "string[]", 'birthday' => "string[]", 'sex' => "array", 'email' => "string[]", 'role_id' => "string[]", 'username' => "string[]", 'password' => "string[]"])]
    public function rules(): array
    {
        return [
            'full_name' => ['nullable', 'string'],
            'phone' => ['nullable, string'],
            'birthday' => ['nullable, string'],
            'sex' => ['nullable', new Enum(CreateRequest::class)],
            'email' => ['required', 'email'],
            'role_id' => ['required', 'exists:roles, id'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}