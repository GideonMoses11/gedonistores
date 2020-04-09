<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    protected $fillable = ['addressline', 'city', 'state', 'zip', 'phone', 'country'];
}
