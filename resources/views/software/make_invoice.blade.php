@extends('software.layouts.header')
@section('software')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Make Invoice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Make Invoice</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="getCustomer">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Select Customer</h4>

                        </div><!-- end card header -->
                        @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-4">
                                    <div class="col-xxl-4 col-md-4">
                                        <select class="js-example-basic-single select2-hidden-accessible"
                                            name="customer_tag">
                                            @foreach ($customers as $customer)

                                            <option value="{{ $customer->tag_id }}">{{ $customer->name
                                                ."(".$customer->tag_id.")" }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-xxl-3 col-md-3 text-center ">
                                        <button type="submit" class="btn btn-success w-100">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </div>
        <div class="col-lg-12 customer-into-card d-none" id="customer-into-card">
            <div class="row">
                <div class="col-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Personal Info</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="ps-0" scope="row">Full Name :</th>
                                            <td class="text-muted">Anna Adame</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Mobile :</th>
                                            <td class="text-muted">+(91) 9999922222</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">E-mail :</th>
                                            <td class="text-muted">daveadame@velzon.com</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Joining Date</th>
                                            <td class="text-muted">24 Nov 2021</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Business Info</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="ps-0" scope="row">Business Name :</th>
                                            <td class="text-muted">Anna Adame</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">GST Number :</th>
                                            <td class="text-muted">+(1) 987 6543</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">E-mail :</th>
                                            <td class="text-muted">daveadame@velzon.com</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">Location :</th>
                                            <td class="text-muted">California, United States
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row make-invoice-div d-none" id="make-invoice-div">
            <div class="col-lg-12">
                <form action="{{ route('make.invoice.post') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Enter Detail</h4>

                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-success form-switch-md" dir="ltr">
                                    <label class="form-check-label" for="gstcheckbox">GST</label>
                                    <input type="checkbox" class="form-check-input" id="gstcheckbox" name="get_no_off"
                                        checked>
                                </div>
                            </div>
                            <div class="flex-shrink-0 mx-4">
                                <div class="form-check form-switch form-switch-success form-switch-md" dir="ltr">
                                    <label class="form-check-label" for="discountcheckbox">Discount</label>
                                    <input type="checkbox" class="form-check-input" id="discountcheckbox"
                                        name="discount_on _off" checked>
                                </div>
                            </div>

                        </div><!-- end card header -->

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col">
                                                Product Details
                                            </th>
                                            <th scope="col" style="width: 120px;">
                                                <div class="d-flex currency-select input-light align-items-center">
                                                    Rate (₹)
                                                </div>
                                            </th>
                                            <th scope="col" style="width: 120px;">Quantity</th>
                                            <th scope="col" class="text-end" style="width: 150px;">Amount</th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="newlink">
                                        <tr id="1" class="product">
                                            <th scope="row" class="product-id">1</th>
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0"
                                                        id="productName-1" placeholder="Product Name" required=""  name="product_name[]">
                                                    <div class="invalid-feedback">
                                                        Please enter a product name
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control product-price bg-light border-0"
                                                    id="productRate-1" step="0.01" placeholder="0.00" required=""  name="product_rate[]">
                                                <div class="invalid-feedback">
                                                    Please enter a rate
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" id="product-qty-1"
                                                        value="1" readonly="" name="product_qty[]">
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div>
                                                    <input type="text"
                                                        class="form-control bg-light border-0 product-line-price"
                                                        id="productPrice-1" placeholder="₹0.00" readonly="" name="product_price[]">
                                                </div>
                                            </td>
                                            <td class="product-removal">
                                                <a href="javascript:void(0)" class="btn btn-success">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">
                                                <a href="javascript:new_link()" id="add-item"
                                                    class="btn btn-soft-secondary fw-medium"><i
                                                        class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                            </td>
                                        </tr>
                                        <tr class="border-top border-top-dashed mt-2">
                                            <td colspan="4">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="live-preview">
                                                            <div class="row gy-2">
                                                                <div class="col-xxl-4 col-md-4 discout-div">
                                                                    <div>
                                                                        <label for="discount"
                                                                            class="form-label">Discount (₹)</label>
                                                                        <input type="number" class="form-control"
                                                                            id="discount" value="00.0">
                                                                    </div>
                                                                </div>
                                                                @foreach ($gsts as $gst)
                                                                <div class="col-xxl-4 col-md-4 gst-div">
                                                                    <div>
                                                                        <label class="form-label">{{ $gst->full_name }}
                                                                            ({{ $gst->charges }}%)</label>
                                                                        <input type="number" class="form-control"
                                                                            value="{{ $gst->charges }}" disabled
                                                                            data-gst="{{ $gst->charges }}">
                                                                    </div>
                                                                </div>
                                                                @endforeach



                                                            </div>
                                                        </div>

                                            </td>
                                            <td colspan="2" class="p-0">
                                                <table
                                                    class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Sub Total</th>
                                                            <td style="width:150px;">
                                                                <input type="text"
                                                                    class="form-control bg-light border-0"
                                                                    id="cart-subtotal" placeholder="₹0.00" readonly=""
                                                                    name="sub_total">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Discount</th>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control bg-light border-0"
                                                                    id="cart-discount" placeholder="₹0.00" readonly=""
                                                                    name="discount">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total Tax</th>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control bg-light border-0" id="cart-tax"
                                                                    placeholder="₹0.00" readonly="" name="total_tax">
                                                            </td>
                                                        </tr>
                                                        <tr class="border-top border-top-dashed">
                                                            <th scope="row">Total Amount</th>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control bg-light border-0"
                                                                    id="cart-total" placeholder="₹0.00" readonly=""
                                                                    name="total_amount">
                                                            </td>
                                                        </tr>
                                                        <tr class="border-top border-top-dashed">

                                                            <td>
                                                                <div class="col-xxl-12 col-md-12 mt-4">
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-md w-100"
                                                                        value="">Submit
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // CSRF Token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#getCustomer').on('submit', function (e) {
            e.preventDefault();

            const tag_id = $('select[name="customer_tag"]').val();

            $.ajax({
                url: "{{ route('get.customer.details') }}",
                type: "POST",
                data: {
                    customer_tag: tag_id
                },
                success: function (response) {
                    $('#customer-into-card').removeClass('d-none');
                    $('#make-invoice-div').removeClass('d-none');

                    $('#customer-into-card').html(`
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Personal Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr><th class="ps-0">Full Name :</th><td class="text-muted">${response.name}</td></tr>
                                                    <tr><th class="ps-0">Mobile :</th><td class="text-muted">${response.phone}</td></tr>
                                                    <tr><th class="ps-0">E-mail :</th><td class="text-muted">${response.email}</td></tr>
                                                    <tr><th class="ps-0">Joining Date :</th><td class="text-muted">${response.joining_date}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Business Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr><th class="ps-0">Business Name :</th><td class="text-muted">${response.business_name}</td></tr>
                                                    <tr><th class="ps-0">GST Number :</th><td class="text-muted">${response.gst_number}</td></tr>
                                                    <tr><th class="ps-0">E-mail :</th><td class="text-muted">${response.email}</td></tr>
                                                    <tr><th class="ps-0">Location :</th><td class="text-muted">${response.location}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.error || "Something went wrong!");
                }
            });
        });
    });
</script><script>
    let count = 1;
    let products = [];

    $('#gstcheckbox').on('change', function () {
        $('.gst-div').toggle(this.checked);
        calculateTotals();
    });

    $('#discountcheckbox').on('change', function () {
        $('.discout-div').toggle(this.checked);
        if (!this.checked) {
            $('#discount').val(0);
        }
        calculateTotals();
    });

   function new_link() {
    count++;

    const newRow = `
        <tr id="${count}" class="product">
            <th scope="row" class="product-id">${count}</th>
            <td class="text-start">
                <div class="mb-2">
                    <input type="text" class="form-control bg-light border-0 product-name" name="product_name[${count}]" id="productName-${count}" placeholder="Product Name" required>
                    <div class="invalid-feedback">Please enter a product name</div>
                </div>
            </td>
            <td>
                <input type="number" class="form-control product-price bg-light border-0" name="product_price[${count}]" id="productRate-${count}" step="0.01" placeholder="0.00" required>
                <div class="invalid-feedback">Please enter a rate</div>
            </td>
            <td>
                <div class="input-step">
                    <button type="button" class="minus">–</button>
                    <input type="number" class="product-quantity" name="product_qty[${count}]" id="product-qty-${count}" value="1" readonly>
                    <button type="button" class="plus">+</button>
                </div>
            </td>
            <td class="text-end">
                <input type="text" class="form-control bg-light border-0 product-line-price" name="product_total[${count}]" id="productPrice-${count}" placeholder="₹0.00" readonly>
            </td>
            <td class="product-removal">
                <a href="javascript:void(0)" class="btn btn-success delete-product">Delete</a>
            </td>
        </tr>`;

    $("#newlink").append(newRow);

    // Add product placeholder in products array
    products.push({
        id: count,
        name: "",
        rate: 0,
        qty: 1,
        amount: 0
    });
}


    $(document).on('click', '.plus, .minus', function () {
        let qtyInput = $(this).siblings('.product-quantity');
        let qty = parseInt(qtyInput.val()) || 0;
        if ($(this).hasClass('plus')) qty++;
        else if (qty > 0) qty--;
        qtyInput.val(qty);

        updateAmount($(this));
        calculateTotals();
    });

    $(document).on('input', '.product-price', function () {
        updateAmount($(this));
        calculateTotals();
    });

    $('#discount').on('input', function () {
        calculateTotals();
    });

    function updateAmount(elm) {
        let row = elm.closest('tr');
        let id = parseInt(row.attr('id'));
        let rate = parseFloat(row.find('.product-price').val()) || 0;
        let qty = parseInt(row.find('.product-quantity').val()) || 0;
        let total = rate * qty;
        row.find('.product-line-price').val(`₹${total.toFixed(2)}`);

        // Update product in array
        let product = products.find(p => p.id === id);
        if (product) {
            product.rate = rate;
            product.qty = qty;
            product.amount = total;
        }
    }

    $(document).on('click', '.delete-product', function () {
        let row = $(this).closest('tr');
        let id = parseInt(row.attr('id'));
        row.remove();

        // Remove from products array
        products = products.filter(p => p.id !== id);

        calculateTotals();
    });

    $(document).on('input', '.product-name, .product-price', function () {
        let row = $(this).closest('tr');
        let id = parseInt(row.attr('id'));

        let product = products.find(p => p.id === id);
        if (product) {
            product.name = row.find('.product-name').val();
            product.rate = parseFloat(row.find('.product-price').val()) || 0;
            product.qty = parseInt(row.find('.product-quantity').val()) || 1;
            product.amount = product.rate * product.qty;
            row.find('.product-line-price').val(`₹${product.amount.toFixed(2)}`);
        }

        calculateTotals();
    });

    function calculateTotals() {
        let subtotal = 0;
        let totalTax = 0;

        $('.product-line-price').each(function () {
            let price = parseFloat($(this).val().replace(/[₹,]/g, '')) || 0;
            subtotal += price;
        });

        const discountOn = $('#discountcheckbox').is(':checked');
        let discount = discountOn ? parseFloat($('#discount').val()) || 0 : 0;

        const gstOn = $('#gstcheckbox').is(':checked');

        if (gstOn) {
            $('.gst-div input').each(function () {
                let gstPercent = parseFloat($(this).data('gst')) || 0;
                let taxAmount = ((subtotal - discount) * gstPercent) / 100;
                $(this).val(taxAmount.toFixed(2));
                totalTax += taxAmount;
            });
        } else {
            $('.gst-div input').val('');
        }

        let finalTotal = subtotal - discount + totalTax;

        $('#cart-subtotal').val(`₹${subtotal.toFixed(2)}`);
        $('#cart-discount').val(`₹${discount.toFixed(2)}`);
        $('#cart-tax').val(`₹${totalTax.toFixed(2)}`);
        $('#cart-total').val(`₹${finalTotal.toFixed(2)}`);
    }

    $(document).ready(function () {
        calculateTotals();
    });
</script>






@endsection
