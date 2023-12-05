<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telefono', 'servicio'];

        public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

        public function users()
    {
        return $this->belongsToMany(User::class, 'user_appointment')
                ->withPivot('appointment_date', 'client_phone')
                ->withTimestamps();
    }

        

}
