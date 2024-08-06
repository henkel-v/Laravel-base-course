<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    protected $guarded = false;

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
