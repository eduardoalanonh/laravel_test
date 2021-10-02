<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberPostRequest;
use App\Services\Number\NumberService;
use Illuminate\Http\Request;


class NumberController extends Controller
{

    private NumberService $numberService;

    public function __construct(NumberService $numberService)
    {
        $this->numberService = $numberService;
    }

    public function storeNumbers(NumberPostRequest $request, $id)
    {
        return $this->numberService->storeNumbers($request, $id);
    }

    public function getNumberCollection(Request $request, $id)
    {
        return $this->numberService->getNumberCollection($request, $id);
    }

    public function getNumberResource(Request $request, $id, $numberId)
    {
        return $this->numberService->getNumberResource($request, $id, $numberId);
    }

    public function editNumber(Request $request, $id, $numberId)
    {
        $this->numberService->editNumber($request, $id, $numberId);
    }

    public function destroyNumber(Request $request, $id, $numberId)
    {
        $this->numberService->destroyNumber($request, $id, $numberId);
    }

}
