<?php
/**
 * @Author im.phien
 * @Date   Mar 20, 2024
 */

namespace App\Transformers\Commons;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationResource extends Resource
{
    /**
     * SuccessResource constructor.
     *
     * @param LengthAwarePaginator $resource
     * @param string $message
     */
    public function __construct(LengthAwarePaginator $resource, string $message = 'Successful operation')
    {
        $pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'last_page' => $resource->lastPage()
        ];

        parent::__construct($resource, new MetaPaginationResource($message, $pagination));
    }
}