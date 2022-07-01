<?php

namespace App\Http\Controllers\Api;

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
}
