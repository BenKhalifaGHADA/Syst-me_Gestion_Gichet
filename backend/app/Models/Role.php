<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name',];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
