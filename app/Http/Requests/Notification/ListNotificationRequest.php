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
    schema: 'ListNotificationRequest',
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
class ListNotificationRequest extends FormRequest
{
    #[ArrayShape(['start_date' => "string[]", 'end_date' => "string[]"])]
    public function rules(): array
    {
        return [
            'start_date' => ['nullable', 'string'],
            'end_date' => ['nullable', 'string'],
        ];
    }
}