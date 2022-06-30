<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ErrorException;
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

    public function show(Block $block) {
        try{
            if(!$block) throw new ErrorException('Not Found', 404);

            return ResponseHelper::make(
                BlockResource::make($block)
            );
        }catch(ErrorException $err) {
            return ResponseHelper::error(
                $err->getErrors(),
                $err->getMessage(),
                $err->getCode(),
            );
        }
    }
}
