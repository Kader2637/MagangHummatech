<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBoard extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function teams()
    {
        return $this->belongsTo(HummataskTeam::class);
    }
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
