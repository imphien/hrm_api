<?php
/**
 * @Author im.phien
 * @Date   Mar 13, 2024
 */

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use App\Transformers\Auth\LoginResource;
use App\Transformers\Commons\ErrorResource;
use OpenApi\Attributes as OA;
use YaangVu\LaravelBase\Exception\ForbiddenException;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    /**
     * @throws ForbiddenException
     */
    #[OA\Post(
        path: '/v1/auth/login',
        summary: 'User login',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: LoginRequest::class)
        ),
        tags: ['AUTH'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful',
                content: new OA\JsonContent(ref: LoginResource::class)
            ),
            new OA\Response(
                response: 403,
                description: 'Login failed',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 422,
                description: 'The email field is required',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 500,
                description: 'Server error',
                content: new OA\JsonContent(ref: ErrorResource::class)
            )
        ]
    )]
    public function login(LoginRequest $request): LoginResource
    {
        $auth = $this->authService->login($request);

        return LoginResource::make($auth);
    }
}