<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallCycle extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'call_cycles';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'scheduled_visit_date_time',
    ];

    protected $fillable = [
        'outlet_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'csr_role_id',
        'csr_user_id',
        'scheduled_visit_date_time',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function csr_role()
    {
        return $this->belongsTo(Role::class, 'csr_role_id');
    }

    public function csr_user()
    {
        return $this->belongsTo(User::class, 'csr_user_id');
    }

    public function getScheduledVisitDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setScheduledVisitDateTimeAttribute($value)
    {
        $this->attributes['scheduled_visit_date_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
