<?php

namespace App\Services\Number;

use App\Http\Requests\NumberPostRequest;
use App\Http\Resources\NumberResource;
use App\Models\Number;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class NumberService
{

    public function storeNumbers(NumberPostRequest $request, $id)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);
            $number = $customer->numbers()->create($request->all());

            $this->createNumberPreferencesDefault($number);

            return response(null, 201);
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function getNumberCollection(Request $request, $id)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);
            return $customer->numbers()->paginate();
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function getNumberResource(Request $request, $id, $numberId)
    {
        try {
            $customer = $request->user()->customers()->find($id);

            return new NumberResource($customer->numbers()->findOrFail($numberId));
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function editNumber(Request $request, $id, $numberId)
    {
        try {
            $customer = $request->user()->customers()->find($id);

            $customer->numbers()->findOrFail($numberId)->update($request->all());
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function destroyNumber(Request $request, $id, $numberId)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);

            $customer->numbers()->findOrFail($numberId)?->delete();
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    private function createNumberPreferencesDefault(Number $number): void
    {
        $number->numberPreferences()->create([
            'name' => 'auto_attendant',
            'value' => '1'
        ]);

        $number->numberPreferences()->create([
            'name' => 'voicemail_enabled',
            'value' => '1'
        ]);
    }
}
