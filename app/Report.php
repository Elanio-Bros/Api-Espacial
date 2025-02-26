<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'external_id';
    protected $fillable = [
        'external_id',
        'title',
        'url',
        'summary',
    ];
}
