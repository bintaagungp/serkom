<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserListrik extends Model
{
    protected $table = 'user_listrik';

    public function tarif(): HasOne
    {
        return $this->hasOne(Tarif::class);
    }
}
