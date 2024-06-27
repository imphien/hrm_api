<?php
/**
 * @Author im.phien
 * @Date   Apr 16, 2024
 */

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\RoleService;
use App\Transformers\Commons\ErrorResource;
use App\Transformers\Role\RoleCollection;
use Illuminate\Http\JsonResponse;
use YaangVu\LaravelBase\Base\BaseController;
use OpenApi\Attributes as OA;

class RoleController extends BaseController
{
    /**
     * @param Role   $role
     * @param string $roleService
     */
    public function __construct(private readonly Role $role, string $roleService = RoleService::class)
    {
        parent::__construct($this->role, $roleService);
    }

    #[OA\Get(
        path: '/roles',
        summary: 'Get all roles.',
        security: [['BearerAuth' => []]],
        tags: ['ROLES'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful',
                content: new OA\JsonContent(ref: RoleCollection::class)
            ),
            new OA\Response(
                response: 500,
                description: 'Server error',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
        ]
    )]
    public function getAll(): RoleCollection
    {
        $roles = $this->service->getAll();

        return RoleCollection::make($roles);
    }
}