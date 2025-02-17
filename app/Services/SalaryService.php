<?php
/**
 * @Author im.phien
 * @Date   Dec 01, 2024
 */

namespace App\Services;

use App\Import\SalaryImport;
use App\Models\Salary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use YaangVu\LaravelBase\Base\BaseService;

class SalaryService extends BaseService
{
    public function __construct(private readonly Model $model = new Salary(), private readonly ?string $alias = null)
    {
        parent::__construct($this->model, $this->alias);
    }

    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Jun 24, 2024
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function getAll(Request $request): Collection
    {
        $month = $request->get('month');
        $fullName   = $request->get('full_name');
        $userId      = $request->get('user_id');

        return $this->model::query()
                           ->with(['user'])
                           ->when($month, function ($q) use ($month) {
                               $q->where('month', 'LIKE', '%' . $month . '%');
                           })
                           ->when($fullName, function ($q) use ($fullName) {
                               $q->whereHas('user', function ($q) use ($fullName) {
                                   $q->where('users.full_name', 'LIKE', '%' . $fullName . '%');
                               });
                           })
                           ->when($userId, function ($q) use ($userId) {
                               $q->whereHas('user', function ($q) use ($userId) {
                                   $q->where('users.id', '=', $userId);
                               });
                           })
                           ->get();
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new SalaryImport, $file);
    }
}