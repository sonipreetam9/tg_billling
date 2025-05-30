@extends('software.layouts.header')
@section('software')

@php
$profitLoose = strtolower($wallet->profit_loose);
$textClass = $profitLoose === 'loss' ? 'text-danger' : 'text-success';
$textClasss = $profitLoose === 'loss' ? 'danger' : 'success';
@endphp

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Wallet Amount</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">₹<span class="counter-value"
                                        data-target="{{ $wallet->amount }}"> {{ $wallet->amount }}</span> </h2>
                                <p class="mb-0 text-muted"></p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-primary rounded-circle fs-2">
                                        <i class="mdi mdi-currency-rupee"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Total Profit</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">₹<span class="counter-value"
                                        data-target="{{ $wallet->total_profit }}">{{ $wallet->total_profit }}</span>
                                </h2>
                                <p class="mb-0 text-muted"></p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success rounded-circle fs-2">
                                        <i class="mdi mdi-arrow-up-thin"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-md-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Total Loose</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">₹<span class="counter-value"
                                        data-target="{{ $wallet->total_loose }}">{{ $wallet->total_loose }}</span></h2>
                                <p class="mb-0 text-muted"></p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-danger rounded-circle fs-2">
                                        <i class="mdi mdi-arrow-down-thin"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-md-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Profit/Loose</p>
                                <h3 class="mt-4 ff-secondary fw-semibold {{ $textClass }}">
                                    {{ ucfirst($profitLoose) }}
                                </h3>
                                <p class="mb-0 text-muted"></p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-{{ $textClasss }} rounded-circle fs-2">
                                        <i class="mdi mdi-alert-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>


        <div class="row">


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Recent Transactions</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                                <i class="ri-file-list-3-line align-middle"></i> Generate Report
                            </button>
                        </div>
                    </div><!-- end card header -->


                    <div class="card-body p-4">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="table-light text-center text-muted">
                                    <tr>
                                        <th>#</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Final Amount</th>
                                        <th>Mode</th>
                                        <th>Type</th>
                                        <th>Comment</th>
                                        <th>Batch</th>
                                        <th>Date</th>
                                    </tr>
                                    <style>
                                        th {
                                            font-weight: 900;
                                            color: black !important;
                                        }

                                        .price-tag {
                                            font-size: 13px;
                                        }
                                    </style>
                                </thead>
                                <tbody class="align-middle text-center">
                                    @foreach ($transactions as $index => $trans)
                                    <tr class="bg-light">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($trans->credit > 0)
                                            <span class="badge bg-success px-2 py-1 price-tag">
                                                ₹ {{ number_format($trans->credit, 2) }}
                                            </span>
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($trans->debit > 0)
                                            <span class="badge bg-danger px-3 py-2 price-tag">
                                                ₹ {{ number_format($trans->debit, 2) }}
                                            </span>
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="badge bg-primary text-white px-3 py-2 price-tag">
                                                ₹ {{ number_format($trans->final_amount, 2) }}
                                            </span>
                                        </td>
                                        <td>{{ ucfirst($trans->transaction_mode) }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $trans->trans_add_withdraw == 'add' ? 'success' : 'danger' }}">
                                                {{ ucfirst($trans->trans_add_withdraw) }}
                                            </span>
                                        </td>
                                        <td>{{ $trans->comment }}</td>
                                        <td>{{ $trans->batch }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trans->date)->format('d M, Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div> <!-- .card-->
            </div> <!-- .col-->
        </div> <!-- end row-->

    </div> <!-- end .h-100-->

</div> <!-- end col -->


</div>

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
