<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audit extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'audits';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PROMO_POSTER_VISIBLE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const KAZANG_POSTER_VISIBLE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const DEVICE_IN_CORRECT_POSITION_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const HOLA_CLUB_POSTER_AVAILABLE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const AT_LEAST_2_SPARE_TILL_ROLLS_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const PROMOTIONS_DISPLAYED_ON_DEVICE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const MORE_THAN_20_HOLA_CLUB_CARDS_AVAILABLE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $fillable = [
        'date',
        'end_time',
        'outlet_id',
        'updated_at',
        'created_at',
        'deleted_at',
        'start_time',
        'wholesaler_2',
        'wholesaler_1',
        'wholesaler_3',
        'promo_poster_visible',
        'kazang_poster_visible',
        'hola_club_poster_available',
        'device_in_correct_position',
        'at_least_2_spare_till_rolls',
        'promotions_displayed_on_device',
        'more_than_20_hola_club_cards_available',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
