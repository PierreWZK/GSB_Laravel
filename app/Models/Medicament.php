<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Medicament extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'medicament';
    protected $primaryKey = 'MED_DEPOTLEGAL';
    public $timestamps = false;
    public $incrementing = false;
}