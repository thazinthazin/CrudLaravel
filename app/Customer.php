<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date', 'place', 'gender', 'hobby'
    ];
}
