<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    protected $statuses = [
        1 => 'Unused',
        2 => 'Used',
    ];


    public function block() {
        return $this->belongsTo(Block::class);
    }
}
