<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    protected $fillable = [
        // 'staffPics',
        'fname',
        'lname',
        'role',
        'phone',
        'email',
        'password',
    ];
    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute ($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
