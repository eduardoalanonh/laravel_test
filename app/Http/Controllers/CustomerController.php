<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPostRequest;
use App\Http\Resources\CustomerResource;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;


class CustomerController extends Controller
{

    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getCustomerCollection(Request $request)
    {
        return $this->customerService->getCustomerCollection($request);
    }

    public function getCustomer(Request $request, $id)
    {
        return $this->customerService->getCustomer($request, $id);
    }

    public function editCustomer(CustomerPostRequest $request, $id)
    {
        $this->customerService->editCustomer($request, $id);
    }

    public function storeCustomer(CustomerPostRequest $request)
    {
        return $this->customerService->storeCustomer($request);

    }

    public function destroyCustomer(Request $request, $id)
    {
        $this->customerService->destroyCustomer($request, $id);
    }

}
