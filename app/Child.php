<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Child extends Model
{
    use SearchableTrait;

    protected $table = 'children';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $searchable = [
        'columns' => [
            'person.first_name' => 10,
            'person.middle_name' => 10,
            'person.last_name' => 10,
        ],
        'joins' => [
            'person' => ['children.person_id', 'person.id'],
        ],
    ];

}
