<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Filiere extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    protected $fillable = ['nom'];

    protected static function booted()
    {
        static::deleting(function ($model) {
            if (is_null($model->deleted_by)) {
                $model->deleted_by = Auth::id();
                $model->save();
            }
        });
    }
}
