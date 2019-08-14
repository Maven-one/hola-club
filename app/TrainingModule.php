<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingModule extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'training_modules';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
