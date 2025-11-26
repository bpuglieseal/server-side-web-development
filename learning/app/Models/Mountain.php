<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    /** @use HasFactory<\Database\Factories\MountainFactory> */
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'mountain_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'mountain_id',
        'mountain_name',
        'mountain_height',
        'mountain_belongs_to_range',
        'mountain_first_climb_date',
        'mountain_continent',
    ];
}
