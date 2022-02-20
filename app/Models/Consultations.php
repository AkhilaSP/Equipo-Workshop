<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    protected $fillable = [
        'clinic_id', 'physician_id', 'patient_id', 'chief_complaint','consulatation_note'
    ];
    public function clinic()
    {
        return $this->belongsTo(Clinic::class,'clinic_id','id');
    }
    public function physician()
    {
        return $this->belongsTo(Physicians::class,'physician_id','id');
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class,'patient_id','id');
    }
}
