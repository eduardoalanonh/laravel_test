<?php

namespace App\Services\NumberPreference;


use App\Http\Requests\NumberPreferencePostRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class NumberPreferenceService
{

    public function getNumberPreferencesCollection(Request $request, $id, $numberId)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);
            $number = $customer->numbers()->findOrFail($numberId);
            return $number->numberPreferences()->paginate();
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function destroyNumberPreferences(Request $request, $id, $numberId, $numberPreferenceId)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);

            $customer->numbers()->findOrFail($numberId)?->numberPreferences()->findOrFail($numberPreferenceId)->delete();
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function storeNumberPreferences(NumberPreferencePostRequest $request, $id, $numberId)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);

            $customer->numbers()->findOrFail($numberId)?->numberPreferences()->create($request->all());

            return response(null, 201);
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }

    public function editNumberPreferences(Request $request, $id, $numberId, $numberPreferenceId)
    {
        try {
            $customer = $request->user()->customers()->findOrFail($id);

            $number = $customer->numbers()->findOrFail($numberId);

            $number->numberPreferences()->findOrFail($numberPreferenceId)?->update($request->all());
        } catch (ModelNotFoundException) {
            return response()->json(['model' => 'model not found'], 404);
        }
    }
}
