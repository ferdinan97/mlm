<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downline extends Model
{
    use HasFactory;

    protected $fillable = [
        'bawahan_id',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo(User::class,'bawahan_id');
    }

    
}
