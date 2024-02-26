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
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Transection</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 my-3">
                                    <h3 class="mb-2">{{ count($transections) }}</h3>
                                    <div class="d-flex align-items-baseline  ">
                                        <p class="text-success ">
                                            <span>Based on Data</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search and View Details of All the Transections</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($transections)

                                @foreach($transections as $item)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->customer->full_name}}</td>
                                        <td>PKR {{ $item->amount}}</td>
                                        <td>
                                            <span
                                                    class="badge rounded-pill @if($item->type == "income") bg-success @elseif($item->type == "expense")bg-danger @endif">
                                                {{ $item->type == 'income' ? "Customer Paid" : "You Paid" }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('l jS \of F Y h:i:s A')}}</td>


                                        <td>

                                            <a class="btn btn-sm btn-outline-warning d-flex align-items-center"
                                               href="{{ route("job.detail",$item->customer->id) }}"
                                            >
                                                <i class="btn-icon-prepend" data-feather="eye"></i>

                                                <span class="mx-2">
                                                    Details
                                                </span>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <p>No data found</p>
                            @endif

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
