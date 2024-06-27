<?php
/**
 * @Author im.phien
 * @Date   Apr 15, 2024
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = ['name', 'guard_name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }
}