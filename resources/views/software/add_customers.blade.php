@extends('software.layouts.header')
@section('software')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">add customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Enter Customer Deatils</h4>

                    </div><!-- end card header -->
                    <form action="{{ route('add.customer.post') }}" method="POST">
                        @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-4">

                                    <div class="col-xxl-6 col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                                value="{{ old('name') }}" required>
                                            <label for="name">Customer Name</label>
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="business_name"
                                                name="business_name" placeholder="" value="{{ old('business_name') }}"
                                                required>
                                            <label for="business_name">Business Name</label>
                                            @error('business_name') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="" value="{{ old('email') }}" required>
                                            <label for="email">Email</label>
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                placeholder="" value="{{ old('phone') }}" required>
                                            <label for="phone">Phone</label>
                                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="city" name="city" placeholder=""
                                                value="{{ old('city') }}" required>
                                            <label for="city">City</label>
                                            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="state" name="state"
                                                placeholder="" value="{{ old('state') }}" required>
                                            <label for="state">State</label>
                                            @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="country" name="country"
                                                placeholder="" value="{{ old('country') }}" required>
                                            <label for="country">Country</label>
                                            @error('country') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="pin_code" name="pin_code"
                                                placeholder="" value="{{ old('pin_code') }}" required>
                                            <label for="pin_code">Pin Code</label>
                                            @error('pin_code') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gst_number" name="gst_number"
                                                placeholder="" value="{{ old('gst_number') }}">
                                            <label for="gst_number">GST Number <span class="text-muted">(Optional)</span></label>
                                            @error('gst_number') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-12 col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="address" name="address" placeholder=""
                                                required>{{ old('address') }}</textarea>
                                            <label for="address">Address</label>
                                            @error('address') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xxl-12 col-md-12 mt-3 text-center">
                                        <button type="submit" class="btn btn-success w-100">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Allow only 10 digits for phone
    $('#phone').on('input', function () {
        let value = $(this).val().replace(/\D/g, ''); // Remove non-digits
        if (value.length > 10) {
            value = value.slice(0, 10); // Limit to 10 digits
        }
        $(this).val(value);
    });

    // Allow only 6 digits for pin code
    $('#pin_code').on('input', function () {
        let value = $(this).val().replace(/\D/g, ''); // Remove non-digits
        if (value.length > 6) {
            value = value.slice(0, 6); // Limit to 6 digits
        }
        $(this).val(value);
    });
});
</script>

@endsection
