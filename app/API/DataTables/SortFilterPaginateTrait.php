<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 00:22
 */

namespace App\API\DataTables;


use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;

trait SortFilterPaginateTrait
{
    protected $perPage = 10;

    public function sortFilterPaginate($model)
    {
        $filtered = $this->filter($model);

        $sorted = $this->sort($filtered);

        return $this->paginate($sorted);
    }

    public function filter($model)
    {
        $state = Input::get('tableState');

        if (isset($state['search']['predicateObject']['$'])) {
            $query = $state['search']['predicateObject']['$'];

            $model = $model::search($query, null, true);
        }

        return $model;
    }

    public function sort($model)
    {
        $state = Input::get('tableState');

        if (isset($state['sort'])) {
            try {
                $state['sort']['reverse'] == 'true' ? $dir = 'DESC' : $dir = 'ASC';

                $model = $model->orderBy($state['sort']['predicate'], $dir);
            } catch (QueryException $e) {
            }
        }

        return $model;
    }

    public function paginate($model)
    {
        $page = $model->get();
        $state = Input::get('tableState');

        if ($state['pagination']) {
            $offset = (int)$state['pagination']['start'];
            $this->perPage = $state['pagination']['number'];
            $model = $model->offset($offset)->take($this->perPage)->get();
        } else {
            $offset = 0;
            $model = $model->offset($offset)->take($this->perPage)->get();
        }
        $totalPages = ceil(count($page) / $this->perPage);

        return [
            'model' => $model,
            'offset' => $offset,
            'total_pages' => $totalPages
        ];
    }

    public function sortAndPaginate($model)
    {
        return $this->paginate($this->sort($model));
    }

    public function addPaginationToResource($paginatedModel, $resource)
    {
        return $resource->setMetaValue('pagination', ['offset' => $paginatedModel['offset'],
                                                      'total_pages' => $paginatedModel['total_pages']]);
    }
}