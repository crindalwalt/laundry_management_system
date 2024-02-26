@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <a href="#" class="noble-ui-logo d-block mt-3">Paradise<span>Laundry</span></a>
                            <p class="mt-1 mb-1"><b>Laundry Made Easy</b></p>
                            <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                            <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                            <p>{{ $job->customer->full_name }},<br> {{$job->customer->phone_number}}
                                ,<br> {{$job->customer->colony ?? ""}}</p>
                        </div>
                        <div class="col-lg-3 pe-0">
                            <h4 class="fw-bold text-uppercase text-end mt-4 mb-2">invoice</h4>
                            <h6 class="text-end mb-5 pb-4"># {{$job->Job_id}}</h6>
                            <p class="text-end mb-1">Balance Due</p>
                            <h4 class="text-end fw-normal">PKR {{ $total_due->amount ?? 0 }}</h4>
                            <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span
                                    class="text-muted">Invoice Date :</span> {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format(' j  F Y ')}}
                            </h6>
                        </div>
                    </div>


{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 grid-margin stretch-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h6 class="card-title">{{ $job->job_id }}</h6>--}}
{{--                                    <p class="text-muted mb-3">View Details for this job</p>--}}
{{--                                    <div class="table-responsive pt-3">--}}
{{--                                        <table class="table table-bordered">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>--}}
{{--                                                    #--}}
{{--                                                </th>--}}
{{--                                                <th>--}}
{{--                                                    Property--}}
{{--                                                </th>--}}
{{--                                                <th>--}}
{{--                                                    Value--}}
{{--                                                </th>--}}

{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    1--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Customer Name--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>{{ $job->customer->full_name }}</h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    2--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Number of Cloths--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>{{ $job->cloth }}</h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    6--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Job type--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>--}}
{{--                                                        {{ $job->job_type }}--}}
{{--                                                    </h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    5--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Payment--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>--}}
{{--                                                        PKR {{ $job->payment }}--}}
{{--                                                    </h3>--}}

{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    3--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Payment Status--}}
{{--                                                </td>--}}
{{--                                                <td>--}}

{{--                                                    <h3--}}
{{--                                                        class="badge rounded-pill px-5 py-2 @if($job->payment_status == "pending") bg-danger @elseif($job->payment_status == "paid")bg-success @endif">--}}
{{--                                                        {{ $job->payment_status == 'pending' ? "Udhar" : "paid" }}--}}
{{--                                                    </h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    4--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Job started--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>--}}
{{--                                                        {{ \Carbon\Carbon::parse($job->created_at)->format('l jS \of F Y h:i:s A')}}--}}

{{--                                                    </h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    4--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Picking Time--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <h3>--}}
{{--                                                        {{ \Carbon\Carbon::parse($job->picking_time)->format('l jS \of F Y h:i:s A')}}--}}

{{--                                                    </h3>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}


{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    7--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Note--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <p>--}}
{{--                                                        {!! $job->description !!}--}}
{{--                                                    </p>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    3--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    Udhar Khata--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="{{ route("job.detail",$job->customer_id) }}" class="btn btn-md btn-info px-3 me-2">Visit Customer Khata</a>--}}
{{--                                                    <a href="{{ route("print.pdf",$job->id) }}" class="btn btn-md btn-success px-3 me-2">Print Invoice</a>--}}
{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Property
                                    </th>
                                    <th>
                                        Value
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Customer Name
                                    </td>
                                    <td>
                                        <p>{{ $job->customer->full_name }}</p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Number of Cloths
                                    </td>
                                    <td>
                                        <p>{{ $job->cloth }}</p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        Job type
                                    </td>
                                    <td>
                                        <p>
                                            {{ $job->job_type }}
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        Payment
                                    </td>
                                    <td>
                                        <p>
                                            PKR {{ $job->payment }}
                                        </p>

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Payment Status
                                    </td>
                                    <td>

                                        <p
                                            class="badge rounded-pill px-5 py-2 @if($job->payment_status == "pending") bg-danger @elseif($job->payment_status == "paid")bg-success @endif">
                                            {{ $job->payment_status == 'pending' ? "Udhar" : "paid" }}
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        Job started
                                    </td>
                                    <td>
                                        <p>
                                            {{ \Carbon\Carbon::parse($job->created_at)->format('l jS \of F Y h:i:s A')}}

                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        Picking Time
                                    </td>
                                    <td>
                                        <p>
                                            {{ \Carbon\Carbon::parse($job->picking_time)->format('l jS \of F Y h:i:s A')}}

                                        </p>
                                    </td>

                                </tr>


                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        Note
                                    </td>
                                    <td>
                                        <p>
                                            {!! $job->description !!}
                                        </p>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="text-end">PKR {{$job->payment}}</td>
                                        </tr>
                                        <tr>
                                            <td>TAX (discounted)</td>
                                            <td class="text-end">PKR 0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">Total</td>
                                            <td class="text-bold-800 text-end"> PKR {{ $job->payment }}</td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td class="text-bold-800">Balance Due</td>
                                            <td class="text-bold-800 text-end">PKR {{ $total_due->amount ?? 0 + $job->payment }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="container-fluid w-100">--}}
{{--                        <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"--}}
{{--                                                                                              class="me-3 icon-md"></i>Send--}}
{{--                            Invoice</a>--}}
{{--                        <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer"--}}
{{--                                                                                                 class="me-2 icon-md"></i>Print</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
