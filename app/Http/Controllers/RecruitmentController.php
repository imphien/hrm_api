<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Services\RecruitmentService;
use App\Transformers\Commons\ErrorResource;
use App\Transformers\Commons\TrvSuccessResource;
use App\Transformers\Recruitment\RecruitmentsCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;
use YaangVu\LaravelBase\Base\BaseController;

class RecruitmentController extends BaseController
{
    public function __construct(private readonly Recruitment $recruitment, string $recruitmentService = RecruitmentService::class)
    {
        parent::__construct($this->recruitment, $recruitmentService);
    }

    #[OA\Get(
        path: '/recruitment',
        summary: 'Get recruitments. ***DONE***',
        security: [['BearerAuth' => []]],
        tags: ['RECRUITMENTS'],
        parameters: [
            new OA\Parameter(
                name:        'start_date',
                description: 'Start date',
                in:          'query',
                schema:      new OA\Schema(
                                 type: 'string',
                             ),
                example:     '13-08-2000'
            ),
            new OA\Parameter(
                name:        'end_date',
                description: 'End date',
                in:          'query',
                schema:      new OA\Schema(
                              type: 'string',
                          ),
                example:     '13-08-2000'
            ),
            new OA\Parameter(
                name: 'position',
                description: 'Position',
                in:          'query',
                schema:      new OA\Schema(
                          type: 'string',
                      ),
                example: 'Developer',
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful',
                content: new OA\JsonContent(ref: RecruitmentsCollection::class)
            ),
            new OA\Response(
                response: 400,
                description: 'End date invalid.',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 401,
                description: 'Unauthenticated',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 500,
                description: "Server error",
                content: new OA\JsonContent(ref: ErrorResource::class)
            )
        ]
    )]
    public function getAll(Request $request): JsonResponse
    {
        $result = RecruitmentsCollection::make($this->service->getAll($request));

        return response()->json($result);
    }
}
