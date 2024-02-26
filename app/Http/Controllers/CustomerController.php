<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['customers'] = Customer::latest()->get();
        $data["total_customer"] = count($data['customers']);
        $data['total_pending_payment'] = 3000;
        return view("pages.Customers.all_customer")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
//        $data['metadata'] = [];
//        $phoneNumber = $request->input("phone");
//        $query = "select * from customers where phone_number = '$phoneNumber'";
//        $execution = DB::select($query);
//        $data['user'] = Customer::find($execution['id']);
//        dd($data['user']);
//        if ($execution == [] || null) {
//            array_push($data['metadata'], ["usertype" => "new"]);
//            $id = Customer::create([
//                'full_name' => $request->full_name,
//                'phone_number' => $request->phone,
//            ]);
//        } else {
//            array_push($data['metadata'], ["usertype" => "old"]);
//        }

        $phoneNumber = $request->input("phone");
        $customer = Customer::where("phone_number",$phoneNumber)->first();
        if($customer != null){
            $data['total_jobs'] = count($customer->jobs);
            $data['total_payment_pending'] = $customer->jobs->where("payment_status", "pending")->sum("payment");
            return redirect()->route("job.step2", $customer);

        }else{
            $id = Customer::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone,
            ]);
            return redirect()->route("job.step2", $id);

        }
//        return redirect()->route("job.step2", $customer);






//        return redirect()->route("job.step2", $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
