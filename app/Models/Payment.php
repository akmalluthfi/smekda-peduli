<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'method',
        'no',
        'name'
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
