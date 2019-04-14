<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 00:21
 */

namespace App\API\DataTables;


interface SortFilterPaginateInterface
{
    public function sortFilterPaginate($model);
}