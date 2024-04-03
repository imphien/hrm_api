<?php
/**
 * @Author im.phien
 * @Date   Apr 01, 2024
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use YaangVu\LaravelBase\Base\BaseService;

class UserService extends BaseService
{
    public function __construct(private readonly Model $model = new User(), private readonly ?string $alias = null)
    {
        parent::__construct($this->model, $this->alias);
    }

    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Apr 03, 2024
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function getAll(Request $request): Collection
    {
        return $this->model::query()->get();
    }
}