<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Penggunaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penggunaan';

    public function tagihan(): HasOne
    {
        return $this->hasOne(Tagihan::class);
    }
}
