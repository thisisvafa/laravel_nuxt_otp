<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
//        $this->middleware('auth:api');
    }

    public function store(StoreRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'code_number_id' => $request->code_number_id,
            'instagram' => $request->instagram,
            'website' => $request->website,
            'country' => $request->country,
            'city' => $request->city,
            'other_number' => $request->other_number,
            'description' => $request->description,
//            'user_id' => auth()->user()->id,
            'user_id' => 1,
        ]);
        return response()->json(['message' => 'موفق']);
    }
}
