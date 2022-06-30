<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlockResource;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index() {
        $blocks = Block::get();

        return ResponseHelper::make(
            BlockResource::collection($blocks)
        );
    }
}
