<?php

namespace Database\Seeders;

use App\Models\{Block, Slot};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    public function run()
    {
        $blocks = Block::all();
        $slots  = [8, 10, 6, 12];

        $blocks->each(function($block, $index) use($slots) {
            $slot = $slots[$index];
            for($i=1; $i <= $slot; $i++) $block->slots()->create([
                'name'  => "Slot $i"
            ]);
        });
    }
}
