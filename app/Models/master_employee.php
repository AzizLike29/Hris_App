<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class master_employee extends Model
{
    protected $table = 'master_employee';

    protected $fillable = [
        'nip',
        'employee_name',
        'gender',
        'phone_number',
        'address',
        'date_of_birth'
    ];
}
