<?php

namespace App\Http\Controllers\Openpay\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Openpay\Customer\Customer;
class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $customer = new Customer();
        $customer->create($request->all());
    }
}
