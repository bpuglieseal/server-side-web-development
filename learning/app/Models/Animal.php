<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
    protected $primaryKey = 'animal_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ["animal_id", "animal_name", "animal_type"];

    use HasFactory;
    use HasUuids;
}
