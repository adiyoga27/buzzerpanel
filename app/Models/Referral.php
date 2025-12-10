<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'username',
        'parent',
        'commission_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function parentUser()
    {
        return $this->belongsTo(User::class, 'parent', 'username');
    }
}
