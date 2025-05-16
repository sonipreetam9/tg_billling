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
                                <div class="col-6 fw-bold">INV26</div>
                                <div class="col-5">Due Date <span class="float-end">:</span></div>
                                <div class="col-6 fw-bold">07/10/2019</div>
                                <div class="col-5">GSTIN<span class="float-end">:</span></div>
                                <div class="col-6 fw-bold">TECH123456XI</div>
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
                                            <strong>Issued To : Ashwani Dahiya</strong><br />
                                            +91 9999922222<br />
                                            infoashu@gmail.com<br />

                                            Sirsa
                                        </address>
                                    </div>
                                </div>
                            </td>
                            <td class="col-6 bg-light">
                                 <div class="row">
                                    <div class="col">
                                        <address>
                                            <strong>Billing Address:</strong><br />
                                            15 Hodges Mews,<br />
                                            High Wycombe<br />
                                            HP12 3JL<br />
                                            Thailand
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
                                            <td class="col-1 text-center"><strong>SrNo</strong></td>
                                            <td class="col-6 "><strong>Product Name</strong></td>
                                            <td class="col-1 text-center"><strong>Qty</strong></td>
                                            <td class="col-2 text-end"><strong>Rate</strong></td>
                                            <td class="col-2 text-end"><strong>Amount</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-1 text-center">1</td>
                                            <td class="col-6">STYLE KERATIN SH. 250ML</td>
                                            <td class="col-1 text-center">3</td>
                                            <td class="col-2 text-end">$25.75</td>
                                            <td class="col-2 text-end">$77.25</td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-center">2</td>
                                            <td class="col-6">SEASOUL GOLD MOROCCAN ANTI AGEING KIT</td>
                                            <td class="col-1 text-center">1</td>
                                            <td class="col-2 text-end">$40.12</td>
                                            <td class="col-2 text-end">$40.12</td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-center">3</td>
                                            <td class="col-6">KERASOUL ONION SH-200ML</td>
                                            <td class="col-1 text-center">6</td>
                                            <td class="col-2 text-end">$12.00</td>
                                            <td class="col-2 text-end">$72.00</td>
                                        </tr>
                                        <tr>
                                            <td class="col-1 text-center">4</td>
                                            <td class="col-6">KERASOUL ONION MASK-200GM</td>
                                            <td class="col-1 text-center">4</td>
                                            <td class="col-2 text-end">$13.50</td>
                                            <td class="col-2 text-end">$54.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="bg-light fw-600">
                            <td class="col-7 py-1">GSTIN No.: 26AKJPG9221E1W5</td>
                            <td class="col-5 py-1 pe-1">Sub Total: <span class="float-end">$243.37</span></td>
                        </tr>
                        <tr>
                            <td class="col-7 text-1"><span class="fw-600">Bill Amount:</span> <i>Thirty Thousand Forty
                                    Four Only</i></td>
                            <td class="col-5 pe-1">
                                Central Tax: <small>(9.00%)</small> <span class="float-end">$21.09</span><br>
                                State Tax: <small>(9.00%)</small> <span class="float-end">$21.09</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-7 text-1">Note :</td>
                            <td class="col-5 pe-1 bg-light fw-600">
                                Grand Total:<span class="float-end">285.55</span>
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
