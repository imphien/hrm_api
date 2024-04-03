<?php
/**
 * @Author im.phien
 * @Date   Apr 03, 2024
 */

namespace App\Enums;

enum UserSex: int
{
    case MALE = 0;
    case FEMALE = 1;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Nam',
            self::FEMALE => 'Nữ'
        };
    }
}