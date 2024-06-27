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
        $position = $request->get('positions');
        return $this->model::query()
                           ->when($startDate, function ($q) use ($startDate){
                               $q->whereDate('expired', '>=', $startDate);
                           })
                            ->when($startDate, function ($q) use ($endDate){
                                $q->whereDate('expired', '<=', $endDate);
                            })
                           ->when($position, function ($q) use ($position){
                               $q->whereDate('position', '=', $position);
                           })
                           ->get();
    }
}