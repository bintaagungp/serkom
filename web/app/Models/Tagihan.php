<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tagihan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tagihan';

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class);
    }
}
