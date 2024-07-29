<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $guarded = false;

    public function avatar(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }
}
