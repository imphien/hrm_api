<?php
/**
 * @Author im.phien
 * @Date   Nov 24, 2024
 */

namespace App\Services;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use YaangVu\LaravelBase\Base\BaseService;

class NotificationService extends BaseService
{
    public function __construct(private readonly Model $model = new Notification(), private readonly ?string $alias = null)
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
        return $this->model::query()
                           ->when($startDate, function ($q) use ($startDate){
                               $q->whereDate('start_date', '>=', $startDate);
                           })
                           ->when($endDate, function ($q) use ($endDate){
                               $q->whereDate('end_date', '<=', $endDate);
                           })
                           ->get();
    }
}