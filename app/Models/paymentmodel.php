<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentmodel extends Model
{
    use HasFactory;
    public $table = 'members_payments';
}
