<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserListrik extends Model
{
    protected $table = 'user_listrik';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tarif(): BelongsTo
    {
        return $this->belongsTo(Tarif::class);
    }

    public function penggunaan(): HasMany
    {
        return $this->hasMany(Penggunaan::class);
    }
}
