<?php
/**
 * @Author im.phien
 * @Date   Jan 03, 2025
 */

namespace App\Import;

use App\Models\Salary;
use App\Models\Timekeeping;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TimekeepingImport implements ToCollection, WithHeadingRow
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
                'date'     => Carbon::parse($row['date'])->format('Y-m-d'),
                'type'      => $row['type'],
                'start_time' => $row['start_time'],
                'end_time' => $row['end_time'],
                'hours'     => $row['hours'],
            ];
        }

        Timekeeping::query()->insert($data);
    }
}