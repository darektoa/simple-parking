<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ErrorException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlotResource;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParkingController extends Controller
{
    public function enter(Request $request) {
        try{
            $validator = Validator::make($request->all(), [
                'slot_id'   => 'exists:slots,id',
            ]);

            if($validator->fails()) {
                $errors = $validator->errors()->all();
                throw new ErrorException('Unproccessable', 422, $errors);
            }

            $slot = Slot::find((int) $request->slot_id);
            $slot->update([
                'status'    => 2,
                'used_at'   => now(),
            ]);

            return ResponseHelper::make(
                SlotResource::make($slot)
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
