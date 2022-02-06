<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'price','description','title','user_name'
    ];

    // Mutator for Name column
    // when "name" will save, it will convert into lowercase
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    // Accessor for Name column
    // when "name" will accessed, it will convert into uppercase
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
}
