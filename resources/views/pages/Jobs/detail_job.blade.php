@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">All Jobs</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


            <a href="{{ route("customer.all") }}" class="btn btn-info btn-icon-text me-1 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="users"></i>
                All Customers
            </a>
            <a href="{{ route("jobs.add") }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                Add Job
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $job->job_id }}</h6>
                    <p class="text-muted mb-3">View Details for this job</p>
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
                                   <h3>{{ $job->customer->full_name }}</h3>
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
                                    <h3>{{ $job->cloth }}</h3>
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
                                    <h3>
                                        {{ $job->job_type }}
                                    </h3>
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
                                    <h3>
                                    PKR {{ $job->payment }}
                                    </h3>

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

                                    <h3
                                        class="badge rounded-pill px-5 py-2 @if($job->payment_status == "pending") bg-danger @elseif($job->payment_status == "paid")bg-success @endif">
                                                {{ $job->payment_status == 'pending' ? "Pending" : "paid" }}
                                            </h3>
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
                                    <h3>
                                        {{ \Carbon\Carbon::parse($job->created_at)->format('l jS \of F Y h:i:s A')}}

                                    </h3>
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
                                    <h3>
                                        {{ \Carbon\Carbon::parse($job->picking_time)->format('l jS \of F Y h:i:s A')}}

                                    </h3>
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
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Udhar Khata
                                </td>
                                <td>
                                    <a href="{{ route("job.detail",$job->customer_id) }}" class="btn btn-md btn-info px-3 me-2">Visit Customer Khata</a>
                                    <a href="{{ route("print.pdf",$job->id) }}" class="btn btn-md btn-success px-3 me-2">Print Invoice</a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
