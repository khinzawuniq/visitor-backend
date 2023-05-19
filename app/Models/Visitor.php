<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;

class Visitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name', 'email', 'phone', 'address', 'gender', 'vehicle_walk_in', 'visit_purpose', 
        'check_in_date', 'check_out_date', 'status', 'check_out_staff'
    ];

    protected $casts = [
        'check_in_date' => 'datetime:d-m-Y H:i:s',
        'check_out_date'   => 'datetime:d-m-Y H:i:s',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'check_out_staff', 'id');
    }

    public function getCheckInDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
    
    // public function getCheckOutDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d-m-Y H:i');
    // }

    public function getGenderAttribute($value)
    {
        return ($value == 1)? 'Male':'Female';
    }
    
    public function getVehicleWalkInAttribute($value)
    {
        return ($value == 1)? 'vehicle':'walk-in';
    }
}