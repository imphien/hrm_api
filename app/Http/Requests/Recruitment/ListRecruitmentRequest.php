<?php
/**
 * @Author im.phien
 * @Date   Jun 24, 2024
 */

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ListRecruitmentRequest',
    required: ['data'],
    properties: [
        new OA\Property(
            property: 'start_date',
            description: 'Start date',
            type: 'string',
            example: '13-08-2000',
            nullable: true,
        ),
        new OA\Property(
            property: 'end_date',
            description: 'End date',
            type: 'string',
            example: '13-08-2000',
            nullable: true,
        ),
        new OA\Property(
            property: 'position',
            description: 'Position',
            type: 'string',
            example: 'Developer',
            nullable: true
        ),
    ],
    type: 'object',
)]
class ListRecruitmentRequest extends FormRequest
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Jun 24, 2024
     *
     * @return array
     */
    #[ArrayShape(['start_date' => "string[]", 'end_date' => "string[]", 'position' => "string[]"])]
    public function rules(): array
    {
        return [
            'start_date' => ['nullable', 'string'],
            'end_date' => ['nullable', 'string'],
            'position' => ['nullable', 'string'],
        ];
    }
}