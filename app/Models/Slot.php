<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    protected $status_names = [
        1 => 'Unused',
        2 => 'Used',
    ];


    public function block() {
        return $this->belongsTo(Block::class);
    }
    

    protected function statusName(): Attribute{
        $get = function() {
            $status      = $this->status;
            $statusNames = collect($this->status_names);
            $statusName  = $statusNames->first(fn($_, $key) => $key === $status);

            return $statusName ?? 'Unknown';
        };

        return Attribute::make($get);
    }
}
