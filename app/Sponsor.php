<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Sponsor extends Model
{
    use SearchableTrait;

    protected $table = 'sponsors';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $searchable = [
        'columns' => [
            'person.first_name' => 10,
            'person.middle_name' => 10,
            'person.last_name' => 10,
        ],
        'joins' => [
            'person' => ['sponsors.person_id', 'person.id'],
        ],
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
