<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'outlets';

    const REBATE_OPTION_SELECT = [
        'Kazang'  => 'Kazang',
        'eWallet' => 'eWallet',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'installation_date',
    ];

    const STATUS_SELECT = [
        'ACTIVE'                  => 'Active',
        'PENDING DECOMMISSION'    => 'Pending Decommission',
        'PROVISIONED'             => 'Provisioned',
        'REQUEST TO DECOMMISSION' => 'Request to Decommission',
        'SUSPENDED'               => 'Suspended',
    ];

    const PROVINCE_SELECT = [
        'EASTERN CAPE'  => 'Eastern Cape',
        'GAUTENG'       => 'Gauteng',
        'KWAZULU-NATAL' => 'KwaZulu-Natal',
        'LIMPOPO'       => 'Limpopo',
        'MPUMALANGA'    => 'Mpumalanga',
        'NORTH WEST'    => 'North West',
        'WESTERN CAPE'  => 'Western Cape',
    ];

    const AREA_SELECT = [
        'ALEXANDRIA'                         => 'Alexandria',
        'ATTERIDGEVILLE'                     => 'Atteridgeville',
        'DIEPSLOOT'                          => 'Diepsloot',
        'DURBAN'                             => 'Durban',
        'EASTERN CAPE'                       => 'Eastern Cape',
        'EGOLI'                              => 'Egoli',
        'EKHURULENI'                         => 'Ekhuruleni',
        'JHB CBD, ROSETTENVILLE & CLEVELAND' => 'JHB CDB, Rosettenville & Cleveland',
    ];

    protected $fillable = [
        'gps',
        'wave',
        'area',
        'w_3_w',
        'status',
        'balance',
        'province',
        'sitecode',
        'site_name',
        'deleted_at',
        'updated_at',
        'created_at',
        'css_role_id',
        'csr_role_id',
        'css_user_id',
        'id_external',
        'csr_user_id',
        'owner_user_id',
        'owner_role_id',
        'rebate_option',
        'account_number',
        'outlet_feedback',
        'qty_last_2_weeks',
        'field_ops_role_id',
        'field_ops_user_id',
        'installation_date',
        'baskets_this_month',
        'caselot_performance',
        'correct_outlet_name',
        'heineken_rep_user_id',
        'heineken_rep_role_id',
        'baskets_last_90_days',
        'baskets_last_2_weeks',
        'no_of_unique_taps_this_month',
        'how_do_i_improve_this_outlet',
        'no_of_active_shoppers_all_time',
        'no_of_unique_taps_last_2_weeks',
        'no_of_active_shoppers_this_month',
        'no_of_active_shoppers_last_2_weeks',
    ];

    public function getInstallationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInstallationDateAttribute($value)
    {
        $this->attributes['installation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function owner_role()
    {
        return $this->belongsTo(Role::class, 'owner_role_id');
    }

    public function owner_user()
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function heineken_rep_role()
    {
        return $this->belongsTo(Role::class, 'heineken_rep_role_id');
    }

    public function heineken_rep_user()
    {
        return $this->belongsTo(User::class, 'heineken_rep_user_id');
    }

    public function css_role()
    {
        return $this->belongsTo(Role::class, 'css_role_id');
    }

    public function css_user()
    {
        return $this->belongsTo(User::class, 'css_user_id');
    }

    public function csr_role()
    {
        return $this->belongsTo(Role::class, 'csr_role_id');
    }

    public function csr_user()
    {
        return $this->belongsTo(User::class, 'csr_user_id');
    }

    public function field_ops_role()
    {
        return $this->belongsTo(Role::class, 'field_ops_role_id');
    }

    public function field_ops_user()
    {
        return $this->belongsTo(User::class, 'field_ops_user_id');
    }
}
