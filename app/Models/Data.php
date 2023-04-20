<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="user";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
