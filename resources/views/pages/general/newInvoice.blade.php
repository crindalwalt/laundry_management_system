<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap');

        * {
            font-size: smaller;
            margin: 0;
            padding: 0;

        }

        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 10px;
            background-color: #ffffff;

        }


        header {
            text-align: center;
            background-color: #000000;
            padding: 10px;
            color: #fff;
        }

        section {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ffffff;
            padding: 8px;
            text-align: left;
            font-size: .8rem;
        }

        th {
            background-color: #000000;
            color: #ffffff;
        }

        .total {
            font-weight: bold;
        }

        .df {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
        }

        #develper {
            position: fixed;
            bottom: 10px;
            left: 50%;

        }

        .urdu {

            font-style: normal;
            font-size: 1rem;
        }

        .srno {
            background-color: black;
            color: white;
        }

        .pname {
            width: 60px;
            font-size: .8rem;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }
        .pval{
            width: 100%;
            font-size: 1rem;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>
<header>
    <div>
        <h1>Paradise Laundry</h1>
        <p>Shop no.14 Al-majeed Paradise Colony Bahawalpur</p>
    </div>
</header>

<div class="df">
    <section>
        <h2>Details</h2>
        <p><strong>Invoice Number:</strong> {{ $job->Job_id }}</p>
        <p><strong>Proprietor:</strong>M. Sarmad</p>
        <p>phone: 03059649722</p>
        <p><strong>Date:</strong>{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format(' j  F Y ')}}</p>
    </section>

    <section>
        <h2>Bill To</h2>
        <p><strong>Name:</strong>{{ $job->customer->full_name }}</p>
        <p><strong>Phone Number</strong> {{$job->customer->phone_number}}</p>
        <p><strong>Address:</strong> {{$job->customer->colony ?? "Not provided"}}</p>
    </section>
</div>
{{-- Job table --}}
<section>
    <h2>Items</h2>
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
            <td class="srno">
                1
            </td>
            <td class="pname">
                Customer Name
            </td>
            <td class="pval">
                <p>{{ $job->customer->full_name }}</p>
            </td>

        </tr>
        <tr>
            <td class="srno">
                2
            </td>
            <td class="pname">
                Number of Cloths
            </td>
            <td class="pval">
                <p>{{ $job->cloth }}</p>
            </td>

        </tr>
        <tr>
            <td class="srno">
                3
            </td>
            <td class="pname">
                Job type
            </td>
            <td class="pval">
                <p>
                    {{ $job->job_type }}
                </p>
            </td>

        </tr>
        <tr>
            <td class="srno">
                4
            </td>
            <td class="pname">
                Payment
            </td>
            <td class="pval">
                <p>
                    PKR {{ $job->payment }}
                </p>

            </td>

        </tr>
        <tr>
            <td class="srno">
                5
            </td>
            <td class="pname">
                Payment Status
            </td>
            <td class="pval">

                <p
                    class="badge rounded-pill px-5 py-2 @if($job->payment_status == "pending") bg-danger @elseif($job->payment_status == "paid")bg-success @endif">
                    {{ $job->payment_status }}
                </p>
            </td>

        </tr>
        <tr>
            <td class="srno">
                6
            </td>
            <td class="pname">
                Note
            </td>
            <td class="pval">

                <p
                    class="badge rounded-pill px-5 py-2 ">
                    {!!  $job->description !!}
                </p>
            </td>

        </tr>


        </tbody>
    </table>

</section>

{{--Total price section--}}
<section style="padding: .5rem; border: 1px solid black; font-size: 1rem">
    <h2>Payment Details</h2>
    <p><strong>Total Amount:</strong> PKR {{$job->payment}}</p>
    <footer>
        <p class="total">Total Udhar to the date: PKR {{ $total_due->amount ?? 0  }}</p>
    </footer>
</section>

{{--Terms of service--}}
<section>
    <h2 style="font-size: 1.3rem;margin-bottom: .3rem">Please Note:</h2>
    <ul class="urdu">
        <li>Kindly retrieve your clothes within 7 days; otherwise, we won't be liable for them.</li>
        <li>If there are any technical issues, the completion of your order may be delayed.</li>
        <li>If your suit is damaged by us, we'll compensate you with 1/4 of its value.</li>
        <li>We're not responsible for any damage caused by fire or natural disasters to the shop.</li>
        <li>This receipt serves as proof of ownership; please store it securely.</li>
        <li>If you misplace your receipt, someone must vouch for you when collecting your clothes.</li>
        <li>We appreciate your cooperation.</li>


    </ul>
</section>

{{--Developer contact--}}
<footer id="develper">
    <strong>Developer Contact</strong>
    <div>
        <b>Shahzad Farooq</b> <br>
        03070825484 <br>
        contact@shahzadfarooq.com
    </div>
</footer>
</body>
</html>
