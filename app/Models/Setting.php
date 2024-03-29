<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['pt', 'pt_value', 'pt_per', 'pd', 'pd_value', 'pd_per', 'rh', 'rh_value', 'rh_per', 'exchange_rate'];
    use HasFactory;
}
