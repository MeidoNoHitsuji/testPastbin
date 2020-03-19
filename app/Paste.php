<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    protected $table = 'pastes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $attributes = [
        'syntax' => 0,
        'expiration' => 0,
        'user_id' => null,
        'exposure' => 0,
        'link' => null,
    ];
}
