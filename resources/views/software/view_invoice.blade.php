<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>View Invoice</title>

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/style.css') }}" />
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Main Content -->
        <main>
            <div class="d-flex border border-dark p-2">
                <!-- Left Side: Company Details -->
                <div class="col-md-7 col-7">
                    <div class="d-flex flex-column">
                        <img src="{{ asset('images/logo/tglogobg.png') }}" alt="" width="170">
                        <strong>{{ $comp_full_name }}</strong>
                        <div>{{ $comp_address }}</div>
                        <div>Phone : {{ $comp_phone }}</div>
                        <div>Email : {{ $comp_email }}</div>
                    </div>
                </div>

                <!-- Right Side: Tax Invoice -->
                <div class="col-md-5 col-5">
                    <div class="border p-2" style="background-color: #e9f3fb;border-radius:5px;">
                        <h6 class="fw-bold text-primary mb-2">Tax Invoice</h6>
                        <div class="row gy-2">
                            <div class="col-5">Invoice No <span class="float-end">:</span></div>
                            <div class="col-6 fw-bold">{{ $invoice->invoice_number }}</div>
                            <div class="col-5">Date <span class="float-end">:</span></div>
                            <div class="col-6 fw-bold">{{ $invoice->date }}</div>
                            <div class="col-5">GSTIN<span class="float-end">:</span></div>
                            <div class="col-6 fw-bold">{{ $comp_gst }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered border border-secondary mb-0">

                    <tbody>


                        <tr>
                            <td class="col-6">
                                <div class="row">
                                    <div class="col">
                                        <address>
                                            <strong>Issued To : {{ $invoice->customer->business_name }}</strong><br />
                                            Person Name : {{ $invoice->customer->name }}<br />
                                            Phone : +91 {{ $invoice->customer->phone }}<br />
                                            Email: {{ $invoice->customer->email }}<br />
                                            GSTIN : {{ $invoice->customer->gst_number }}
                                        </address>
                                    </div>
                                </div>
                            </td>
                            <td class="col-6 bg-light">
                                <div class="row">
                                    <div class="col">
                                        <address>
                                            <strong>Billing Address:</strong><br>
                                            {{ $invoice->customer->address }}<br>
                                            {{ $invoice->customer->city }}, {{ $invoice->customer->state }}<br>
                                            {{ $invoice->customer->country }} - {{ $invoice->customer->pincode }}
                                        </address>

                                    </div>
                                </div>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="p-0">
                                <table class="table table-sm mb-0">
                                    <thead>
                                        <tr class="bg-light">
                                            <td class="col-1 text-center"><strong>#</strong></td>
                                            <td class="col-6 "><strong>Product Name</strong></td>
                                            <td class="col-1 text-center"><strong>Qty</strong></td>
                                            <td class="col-2 text-end"><strong>Rate</strong></td>
                                            <td class="col-2 text-end"><strong>Amount</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->products as $index=> $product )

                                        <tr>
                                            <td class="col-1 text-center">{{ $index+1 }}</td>
                                            <td class="col-6">{{ $product->name }}</td>
                                            <td class="col-1 text-center">{{ $product->qty }}</td>
                                            <td class="col-2 text-end">₹ {{ $product->rate }}</td>
                                            <td class="col-2 text-end">₹ {{ $product->sub_total }}</td>
                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="bg-light fw-600">
                            <td class="col-7 py-1"></td>
                            <td class="col-5 py-1 pe-1">Sub Total: <span class="float-end">
                                    @if ($invoice->discount_yes == "on")
                                    <span style="text-decoration: line-through; color: red;">
                                        ₹{{ number_format($invoice->sub_total) }}
                                    </span>
                                    <span class="ms-2">
                                        ₹{{ number_format($invoice->sub_total - $invoice->discount) }}
                                    </span>
                                    @else
                                    ₹{{ number_format($invoice->sub_total) }}
                                    @endif

                                </span></td>
                        </tr>
                        <tr>
                            <td class="col-7 text-1"><span class="fw-600">Bill Amount:</span> <i>{{ $amount_in_word
                                    }}</i></td>
                            <td class="col-5 pe-1">
                                Central Tax: <small>({{ $invoice->cgst_charge }}%)</small> <span class="float-end">₹ {{
                                    $invoice->cgst }}</span><br>
                                State Tax: <small>({{ $invoice->sgst_charge }}%)</small> <span class="float-end">₹ {{
                                    $invoice->sgst }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-7 text-1">Note :</td>
                            <td class="col-5 pe-1 bg-light fw-600">
                                Grand Total:<span class="float-end">₹ {{ $invoice->grand_total }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-7 text-1">
                                <div class="fw-600">Terms & Condition :</div>
                                <ol>
                                    @foreach ($terms as $term)
                                    <li>{{ $term->name }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="col-5 pe-1 text-end">
                                For, H.R. ENTERPRISE
                                <div class="text-1 fst-italic mt-5">(Authorised Signatory)</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <footer class="text-center mt-4">
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print &
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>
