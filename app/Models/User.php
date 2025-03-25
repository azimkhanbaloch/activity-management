<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'total_points', 'rank'];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
