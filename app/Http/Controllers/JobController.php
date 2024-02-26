<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Job;
use Carbon\Carbon;
use Cassandra\Custom;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['today'] = Carbon::now();
        $jobs_collection = Job::all();
        $current_date = Carbon::now()->toDateString();
        $today_jobs = Job::whereDate("created_at",$current_date)->get();
        $data['jobs'] = $today_jobs;
        $data['total_jobs'] = count($data['jobs']->where("cloth_status","pending"));
        $data['total_pending_payment'] = $today_jobs->where("payment_status", "pending")->sum("payment");

        return view("pages.Jobs.all_jobs")->with($data);
    }

    public function save(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $request->validate([
            'job_id' => ['required'],
            'cloth' => ['required'],
            'payment' => ['required'],
            'payment_status' => ['required'],
            'job_type' => ['required'],
        ]);
        $job = Job::create([
            'Job_id' => $request->job_id,
            'cloth' => $request->cloth,
            'payment' => $request->payment,
            'customer_id' => $request->customer_id,
            'picking_time' => $request->picking_time,
            'payment_status' => $request->payment_status,
            'cloth_status' => "pending",
            'description' => $request->description,
            'job_type' => $request->job_type,
        ]);
//        $customer_account = Account::find($request->customer_id)
        $customer_previous_ammount = $customer->account->amount ?? 0;
        $new_ammount = $request->payment += $customer_previous_ammount;

        if ($request->input("payment_status") == "pending") {

            if ($customer->account()->exists()) {

                $customer->account->update(['amount' => $new_ammount,]);
            } else {
                Account::create([
                    "customer_id" => $request->customer_id,
                    'amount' => $new_ammount,
                ]);
            }
        }
        Alert::success("Job has been saved successfully", "You are being redirected to the jobs dashboards");
        return redirect()->route("job.detail.open",$job->getKey());
    }

    public function job_detail(Job $job)
    {
        $data['job'] = $job;
        return view('pages.Jobs.detail_job')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail(Customer $id)
    {
        $data['job'] = $id;
        $data['user_jobs'] = $id->jobs;
        $data['total_jobs'] = count($id->jobs);
        $data['total_payment_pending'] = $id->jobs->where("payment_status", "pending")->sum("payment");
        return view("pages.Jobs.single_job")->with($data);
    }


    public function create()
    {
        $data['customers'] = Customer::latest()->get();
        return view("pages.Jobs.add_jobs")->with($data);
    }



    public function store(Customer $customer)
    {
        $data['customer'] = $customer;
        $data['job_id'] = "JOB-" . time();
        return view("pages.Jobs.add_job_2")->with($data);
    }



    public function history()
    {
        $data['jobs'] = Job::latest()->get();
        $data['total_jobs'] = count($data['jobs']->where("cloth_status","pending"));
        $data['total_pending_payment'] = $data['jobs']->where("payment_status", "pending")->sum("payment");
        return view("pages.Jobs.all_history")->with($data);
    }

    public function updateStatus(Job $job)
    {
        $job->update([
            "cloth_status" => "delivered",
        ]);
        Alert::success("Well Done","You completed that Job");
        return redirect()->back();
    }

    public function yesterday()
    {
        $data['yesterday'] = Carbon::yesterday();
        $jobs_collection = Job::all();
        $current_date = Carbon::yesterday()->toDateString();
        $today_jobs = Job::whereDate("created_at",$current_date)->get();
        $data['jobs'] = $today_jobs;
        $data['total_jobs'] = count($data['today_jobs']->where("cloth_status","pending"));
        $data['total_pending_payment'] = $today_jobs->where("payment_status", "pending")->sum("payment");

        return view("pages.Jobs.yesterday_jobs")->with($data);
    }


    public function destroy(Job $job)
    {
        $job->delete();
        Alert::success("Job is permanently deleted","Successfully deleted Job from the customer account");
        return redirect()->back();
    }

}
