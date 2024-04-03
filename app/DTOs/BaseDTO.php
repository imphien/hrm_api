<?php
/**
 * @Author im.phien
 * @Date   Mar 18, 2024
 */

namespace App\DTOs;

interface BaseDTO
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Mar 18, 2024
     *
     * @return array
     */
    public function toArray(): array;
}