<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;
    use HasUuids;

    protected $fillable = ["plate", "brand", "model"];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
