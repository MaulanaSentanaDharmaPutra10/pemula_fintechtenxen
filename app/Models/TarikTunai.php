<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarikTunai extends Model
{
    use HasFactory;
    
    protected $fillable = [
       "user_id",
       "order_id",
       "nominals",
       "status"
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }


}

