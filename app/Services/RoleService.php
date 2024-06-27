<?php
/**
 * @Author im.phien
 * @Date   Apr 16, 2024
 */

namespace App\Services;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use YaangVu\LaravelBase\Base\BaseService;

class RoleService extends BaseService
{
    public function __construct(private readonly Model $model = new Role(), private readonly ?string $alias = null)
    {
        parent::__construct($this->model, $this->alias);
    }

    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Apr 16, 2024
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model::query()->get();
    }
}