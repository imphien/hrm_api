<?php
/**
 * @Author im.phien
 * @Date   Jun 24, 2024
 */

namespace App\Services;

use App\Models\Recruitment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Base\BaseService;

class RecruitmentService extends BaseService
{
    public function __construct(private readonly Model $model = new Recruitment(), private readonly ?string $alias = null)
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
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $roleId = $request->get('role_id');
        return $this->model::query()->with(['role'])
                           ->when($startDate, function ($q) use ($startDate){
                               $q->whereDate('expired', '>=', $startDate);
                           })
                            ->when($endDate, function ($q) use ($endDate){
                                $q->whereDate('expired', '<=', $endDate);
                            })
                           ->when($roleId, function ($q) use ($roleId){
                               $q->whereHas('role', function ($q) use ($roleId) {
                                   $q->where('recruitments.role_id', '=', $roleId);
                               });
                           })
                           ->get();
    }
}