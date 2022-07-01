<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ErrorException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlotResource;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index() {
        $slots = Slot::with('block')->get();

        return ResponseHelper::make(
            SlotResource::collection($slots)
        );
    }


    public function show(Slot $slot) {
        try{
            if(!$slot) throw new ErrorException('Not Found', 404);

            return ResponseHelper::make(
                SlotResource::make($slot->load('block'))
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
