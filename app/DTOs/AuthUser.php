<?php
/**
 * @Author im.phien
 * @Date   Mar 18, 2024
 */

namespace App\DTOs;

use JetBrains\PhpStorm\ArrayShape;

class AuthUser
{
    public string $token;

    public int $expiresIn;

    /**
     * @param string $token
     * @param int    $expiresIn
     */
    public function __construct(string $token, int $expiresIn) {
        $this->token = $token;
        $this->expiresIn = $expiresIn;
    }

    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Mar 18, 2024
     *
     * @return array
     */
    #[ArrayShape(['access_token' => "string", 'expires_in' => "int"])]
    public function toArray(): array
    {
        return [
            'access_token' => $this->token,
            'expires_in' => $this->expiresIn,
        ];
    }
}