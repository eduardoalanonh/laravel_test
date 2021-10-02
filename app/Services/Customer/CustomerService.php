<?php

namespace App\Services\Customer;

use App\Http\Requests\CustomerPostRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;


class CustomerService
{

    public function getCustomerCollection(Request $request)
    {
        return $request->user()->customers()->paginate();
    }

    public function getCustomer(Request $request, $id): CustomerResource
    {
        return new CustomerResource($request->user()->customers()->findOrFail($id));
    }

    public function editCustomer(CustomerPostRequest $request, $id): void
    {
        $request->user()->customers()->findOrFail($id)->update($request->all());
    }

    public function storeCustomer(CustomerPostRequest $request)
    {
        $request->user()->customers()->create($request->all());

        return response(null, 201);
    }

    public function destroyCustomer(Request $request, $id): void
    {
        $request->user()->customers()->findOrFail($id)->delete();
    }
}
