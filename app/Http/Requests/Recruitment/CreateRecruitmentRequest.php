<?php
/**
 * @Author im.phien
 * @Date   Nov 18, 2024
 */

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CreateRecruitmentRequest',
    required: ['data'],
    properties: [
        new OA\Property(
            property: 'position',
            description: 'Position',
            type: 'string',
            example: 'PHP',
        ),
        new OA\Property(
            property: 'quantity',
            description: 'Quantity',
            type: 'string',
            example: 'PHP',
        ),
        new OA\Property(
            property: 'content',
            description: 'content',
            type: 'string',
            example: 'Intern',
        ),
        new OA\Property(
            property: 'expired',
            description: 'Expired',
            type: 'string',
            example: '2024-09-09',
        ),
        new OA\Property(
            property: 'requirement',
            description: 'Requirement',
            type: 'string',
            example: 'Kinh nghiem tren 3 nam',
        ),
    ],
    type: 'object',
)]
class CreateRecruitmentRequest extends FormRequest
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Apr 15, 2024
     *
     * @return array
     */
    #[ArrayShape(['position' => "string[]", 'quantity' => "string[]", 'content' => "string[]", 'expired' => "string[]", 'requirement' => "string[]"])]
    public function rules(): array
    {
        return [
            'position' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'content' => ['required', 'string'],
            'expired' => ['required', 'string'],
            'requirement' => ['required', 'string'],
        ];
    }
}