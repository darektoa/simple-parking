<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    public function run()
    {
        $blocks = collect(['Block A', 'Block B', 'Block C', 'Block D']);

        $blocks->each(fn($item) => (
            Block::create([
                'name'  => $item
            ])
        ));
    }
}
