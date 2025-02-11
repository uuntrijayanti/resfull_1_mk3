<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'phone', 'addres', 'birthdate'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
