@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
    <style>


        #star {
            margin-left: -5px !important;
            vertical-align: bottom !important;
            opacity: 0.5;
        }

        .container {
            padding: 0rem !important;
            margin: 1rem 0rem;

        }

        .more {
            opacity: 0.5 !important;
        }

        .btn:hover {
            color: black !important;
        }

        .vl {
            margin: 8px !important;
            width: 2px;
            border-right: 1px solid #aaaaaa;
            height: 25px;
        }


        #plus {
            opacity: 0.8;
        }


        .card {
            border-radius: 10px !important;
        }

        a:hover {
            background-color: #ccc !important;
        }


        .btn-outlined:active {
            color: #FFF;
            border-color: #fff !important;
        }


        img {

            cursor: pointer;
            overflow: visible;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none !important;
        }


    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Customer Data</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


            <button type="button" class="btn btn-info btn-icon-text mb-2 mb-md-0 me-1 ">
                <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                Back to Home
            </button>
            <a href="{{ route("jobs.add") }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                Add Job
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card border-5 pt-2 active ">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 ">
                        <h4 class="card-title "><b>
                                {{ $job->full_name }}
                            </b></h4>

                    </div>
                    <div class="col">
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="card-text text-muted small ">
                                <img src="https://img.icons8.com/metro/26/000000/star.png" class="mr-1 " width="19"
                                     height="19" id="star"> <span class="vl mr-2 ml-0"></span>

                                <span
                                    class="font-weight-bold"> Member since </span>{{ \Carbon\Carbon::parse($job->created_at)->format('l jS \of F Y')}}
                            </p>
                        </h6>
                    </div>
                </div>

            </div>

        </div>


    </div>



    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Jobs</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 my-3">
                                    <h3 class="mb-2">{{$total_jobs}}</h3>
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
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Pending Payment</h6>

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-12 my-3">
                                    <h3 class="mb-2">PKR {{ $job->account->amount ?? "❌" }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>Based on Data </span>
                                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="col-md-4 grid-margin stretch-card">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="d-flex justify-content-between align-items-baseline">--}}
                {{--                                <h6 class="card-title mb-0">Pending Work</h6>--}}

                {{--                            </div>--}}
                {{--                            <div class="row">--}}
                {{--                                <div class="col-6 col-md-12 col-xl-5 my-3">--}}
                {{--                                    <h3 class="mb-2">10 Cloths</h3>--}}
                {{--                                    <div class="d-flex align-items-baseline">--}}
                {{--                                        <p class="text-success">--}}
                {{--                                            <span>Based on Data</span>--}}
                {{--                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>--}}
                {{--                                        </p>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="col-6 col-md-12 col-xl-7">--}}
                {{--                                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">{{ $job->full_name . " Has PKR " . $total_payment_pending . " payment Due " }}</h6>

                    <form class="forms-sample" method="POST" action="{{ route("udhar.pay",$job->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Amount </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="00000" name="amount">
{{--                                <input type="hidden" name="customer_id" value="{{$job->id}}">--}}
                            </div>
                        </div>


                        <div class="mb-4">

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="transection" id="radioInline1" value="income" checked>
                                <label class="form-check-label" for="radioInline1">
                                    Recieving Amount
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="transection" id="radioInlineSelected" value="expense">
                                <label class="form-check-label" for="radioInlineSelected">
                                    Giving Amount
                                </label>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary me-2">Pay Now</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Search and View Details of all the job for {{$job->full_name}}</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Id</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Cloths</th>
                                <th>Job Type</th>
                                <th>Payment</th>
                                <th>Picking Time</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($job->jobs)

                                @foreach($job->jobs as $item)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->Job_id }}</td>
                                        <td>{{ $item->customer->full_name}}</td>
                                        <td>
                                            <div class="p-1" style="@if($item->cloth_status == "pending")background-color: black; color: white; @elseif($item->cloth_status == "delivered") background-color: #00fc00; color: white; @endif border-radius: .2rem;cursor: pointer">
                                                {{ $item->cloth_status }}
                                            </div>
                                        </td>
                                        <td>{{ $item->cloth }}</td>

                                        <td>
                                            <span
                                                class="badge rounded-pill @if($item->job_type == "washing") bg-info @elseif($item->job_type == "dry_cleaning")bg-dark @elseif($item->job_type == "pressing") bg-primary @endif">
                                            {{ $item->job_type }}

                                            </span>
                                        </td>
                                        <td>PKR {{ $item->payment }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->picking_time)->format('l j/n/Y h:i:s A')}}</td>


                                        <td>
                                            <span
                                                class="badge rounded-pill @if($item->payment_status == "pending") bg-danger @elseif($item->payment_status == "paid")bg-success @endif">
                                                {{ $item->payment_status == 'pending' ? "Udhar" : "paid" }}
                                            </span>
                                        </td>
                                        <td class="d-flex">
                                            @if($item->cloth_status == "pending")
                                                <a class="btn btn-sm btn-outline-success d-flex align-items-center me-2"
                                                   href="{{ route("job.update.status",$item->id) }}"
                                                >
                                                    <i class="btn-icon-prepend" data-feather="check"></i>

                                                    <span class="mx-2">
                                                    Done
                                                </span>
                                                </a>
                                            @endif
                                            <a class="btn btn-sm btn-outline-warning d-flex align-items-center"
                                               href="{{ route("job.detail.open",$item->id) }}"
                                            >
                                                <i class="btn-icon-prepend" data-feather="eye"></i>

                                                <span class="mx-2">
                                                    Details
                                                </span>
                                            </a>
                                            @if(\Illuminate\Support\Facades\Auth::user()->email == "sarmad@paradise.com")
                                                <a class="btn btn-sm btn-outline-danger d-flex align-items-center ms-2"
                                                   href="{{ route("job.delete",$item->id) }}"
                                                >
                                                    <i class="btn-icon-prepend" data-feather="eye"></i>

                                                    <span class="mx-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                      <path
                                                          d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </span>
                                                </a>
                                            @endif
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
