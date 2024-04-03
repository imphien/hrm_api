<?php
/**
 * @Author im.phien
 * @Date   Apr 03, 2024
 */

namespace App\Enums;

trait EnumTrait
{
    /**
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Checks if this instance is equal to the given enum instance or value.
     *
     * @param mixed $enumValue
     * @return bool
     */
    public function is(mixed $enumValue): bool
    {
        if ($enumValue instanceof static) {
            return $this->value === $enumValue->value;
        }

        return $this->value === $enumValue;
    }


    /**
     * Checks if this instance is not equal to the given enum instance or value.
     */
    public function isNot(mixed $enumValue): bool
    {
        return !$this->is($enumValue);
    }

    /**
     * @param mixed $enumValue
     * @return bool
     */
    public static function in(mixed $enumValue): bool
    {
        if ($enumValue instanceof self) {
            $enumValue = $enumValue->value;
        }

        return in_array($enumValue, self::values(), true);
    }
}