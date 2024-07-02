<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $guarded = false;

    public function ceo(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(Worker::class, Position::class)
            ->where('position_id', 4);
    }

    public function workers(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->HasManyThrough(Worker::class, Position::class);
    }
}
