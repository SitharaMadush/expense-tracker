<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'amount',
        'description',
        'date',
        'created_by',
    ];


}
