<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ChildSponsorDetail extends Model
{
    use SearchableTrait;

    protected $table = 'child_sponsor_details';
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

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class, 'sponsor_id');
    }

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
