<?php
/**
 * @Author im.phien
 * @Date   Dec 09, 2024
 */

namespace App\Import;

use App\Models\Salary;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryImport implements ToCollection, WithHeadingRow
{
    /**
     * Hàm xử lý từng hàng dữ liệu trong file Excel.
     *
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows): void
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'user_id'   => $row['user_id'],
                'month'     => $row['month'],
                'days'      => $row['days'],
                'allowance' => $row['allowance'],
                'deduction' => $row['deduction'],
                'bonus'     => $row['bonus'],
                'salary'    => $row['salary'],
            ];
        }

        Salary::query()->insert($data);
    }
}