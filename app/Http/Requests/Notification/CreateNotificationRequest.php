<?php
/**
 * @Author im.phien
 * @Date   Nov 24, 2024
 */

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CreateNotificationRequest',
    required: ['data'],
    properties: [
        new OA\Property(
            property: 'start_date',
            description: 'start date',
            type: 'string',
            example: '2022-10-10',
        ),
        new OA\Property(
            property: 'end_date',
            description: 'end date',
            type: 'string',
            example: '2022-10-10',
        ),
        new OA\Property(
            property: 'content',
            description: 'content',
            type: 'string',
            example: 'Lich nghi tet',
        ),
    ],
    type: 'object',
)]
class CreateNotificationRequest extends FormRequest
{
    #[ArrayShape(['start_date' => "string[]", 'end_date' => "string[]", 'content' => "string[]"])]
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'content' => ['required', 'string']
        ];
    }
}