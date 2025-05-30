@extends('software.layouts.header')
@section('software')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Transactions</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Transactions</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Transactions List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display table table-bordered" style="width:100%">
                                <thead>
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
                                </thead>
                                 <style>
                                        th {
                                            font-weight: 900;
                                            color: black !important;
                                        }

                                        .price-tag {
                                            font-size: 13px;
                                        }
                                    </style>
                               <tbody >
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
