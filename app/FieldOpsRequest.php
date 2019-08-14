<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldOpsRequest extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'field_ops_requests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const FAULT_REASON_SELECT = [
        'Reason 1' => 'Reason 1',
        'Reason 2' => 'Reason 2',
        'Reason 3' => 'Reason 3',
    ];

    protected $fillable = [
        'device',
        'outlet_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'fault_reason',
        'fault_description',
    ];

    const DEVICE_SELECT = [
        'T1 Mini 1'   => 'T1 Mini',
        'T1 Mini 2'   => 'T1 Mini 2',
        'Till Drawer' => 'Till Drawer',
        'Scanner'     => 'Scanner',
        'UPS'         => 'UPS',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
}
