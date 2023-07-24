<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrow extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid','username','email', 'phone', 'withdrow','currency'
    ];
}
