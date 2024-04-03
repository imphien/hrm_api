<?php
/**
 * @Author im.phien
 * @Date   Mar 20, 2024
 */

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ['email', 'password'],
    properties: [
        new OA\Property(
            property: 'email',
            type: 'string',
            example: 'example@gmail.com'
        ),
        new OA\Property(
            property: 'password',
            type: 'string',
            example: 'pa55w0rd'
        )
    ]
)]
class LoginRequest extends FormRequest
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Mar 20, 2024
     *
     * @return string[]
     */
    #[ArrayShape(['email' => "string", 'password' => "string"])] public function rules(): array
    {
        return [
          'email' => 'required|email|max:255',
          'password' => 'required|max:255'
        ];
    }
}