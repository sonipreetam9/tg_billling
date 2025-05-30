@extends('software.layouts.header')
@section('software')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Invoice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Invoice</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">All Invoice List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Purchase_Number</th>
                                        <th>Purchase_From</th>
                                        <th>Grand_total</th>
                                        <th>Date</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $index => $purchase)
                                    <tr>
                                        <td class="fw-bold">{{ $index + 1 }}</td>
                                        <td class="text-primary">{{ $purchase->purchase_number }}</td>
                                        <td class="text-dark">{{ $purchase->purchase_from }}</td>
                                        <td>
                                            <span class="badge bg-success fs-6 px-3 py-2">
                                                ₹ {{ number_format($purchase->grand_total, 2) }}
                                            </span>
                                        </td>
                                        <td class="text-muted">{{ $purchase->date }}</td>
                                        <td>
                                            @if($purchase->file)
                                            <span class="badge bg-success text-white">Yes</span>
                                            @else
                                            <span class="badge bg-dark text-white">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('view.invoice', ['invoice_id' => $purchase->id]) }}"
                                                class="btn btn-outline-success btn-sm me-2">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            <a href="#view" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash3"></i> Delete
                                            </a>
                                        </td>
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
