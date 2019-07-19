<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
