<?php
/**
 * @Author im.phien
 * @Date   Mar 18, 2024
 */

namespace App\Services;

use App\DTOs\AuthUser;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use YaangVu\LaravelBase\Exception\ForbiddenException;

class AuthService
{
    /**
     * @throws ForbiddenException
     */
    public function login(LoginRequest $request): AuthUser
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if (!$user) {
            throw new ForbiddenException(__('forbidden.forbidden'), Response::HTTP_FORBIDDEN);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            throw new ForbiddenException(__('forbidden.forbidden'), Response::HTTP_FORBIDDEN);
        }

        return $this->generateToken($user);
    }

    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Mar 18, 2024
     *
     * @param User $user
     *
     * @return AuthUser
     */
    private function generateToken(User $user): AuthUser
    {
        /** @var JWTAuth $auth */
        $auth = Auth::guard();
        $token = $auth->fromUser($user);

        $expiresIn = $auth->factory()->getTTL() * 60;

        return new AuthUser($token, $expiresIn);
    }
}