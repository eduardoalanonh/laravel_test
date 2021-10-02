<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberPreferencePostRequest;
use App\Services\NumberPreference\NumberPreferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NumberPreferencesController extends Controller
{

    private NumberPreferenceService $numberPreferenceService;

    public function __construct(NumberPreferenceService $numberPreferenceService)
    {
        $this->numberPreferenceService = $numberPreferenceService;
    }

    public function getNumberPreferencesCollection(Request $request, $id, $numberId)
    {
        return $this->numberPreferenceService->getNumberPreferencesCollection($request, $id, $numberId);
    }

    public function destroyNumberPreferences(Request $request, $id, $numberId, $numberPreferenceId)
    {
        return $this->numberPreferenceService->destroyNumberPreferences($request, $id, $numberId, $numberPreferenceId);
    }

    public function storeNumberPreferences(NumberPreferencePostRequest $request, $id, $numberId)
    {
        return $this->numberPreferenceService->storeNumberPreferences($request, $id, $numberId);

    }

    public function editNumberPreferences(Request $request, $id, $numberId, $numberPreferenceId)
    {
        return $this->numberPreferenceService->editNumberPreferences($request, $id, $numberId, $numberPreferenceId);
    }
}
