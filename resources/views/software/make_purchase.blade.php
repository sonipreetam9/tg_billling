@extends('software.layouts.header')
@section('software')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Make Purchase</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Make Purchase</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <div class="row make-invoice-div" id="make-invoice-div">
            <div class="col-lg-12">
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('error-e'))
                <p class="alert alert-danger">{{ Session::get('error-e') }}</p>
                @endif
                @if ($errors->any())

                <div class="alert alert-danger">
                    <strong>Oops! There are some mistakes:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('make.purchase.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Enter Details</h4>



                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="live-preview">
                                                <div class="row gy-4">

                                                    <div class="col-xxl-3 col-md-6">
                                                        <div>
                                                            <label for="placeholderInput" class="form-label">Purchased
                                                                From</label>
                                                            <input type="text" class="form-control"
                                                                id="placeholderInput" placeholder="Name here !!" name="purchase_from" required>
                                                        </div>
                                                    </div>


                                                    <div class="col-xxl-3 col-md-6">
                                                        <div>
                                                            <label for="exampleInputdate" class="form-label">Purchased
                                                                Date</label>
                                                            <input type="date" class="form-control"
                                                                id="exampleInputdate" required name="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-6">
                                                        <div>
                                                            <label for="exampleInputdate" class="form-label">Upload Invoice (Image/Pdf)</label>
                                                            <input type="file" class="form-control"
                                                                id="exampleInputdate" name="file_has" accept=".jpg,.jpeg,.pdf,.png,.webp">
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                </div>
                                                <!--end row-->
                                            </div>

                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="invoice-table table table-borderless table-nowrap mb-0">
                                    <thead class="align-middle">
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col">
                                                Product Details
                                            </th>
                                            <th scope="col" style="width: 120px;">
                                                <div class="d-flex input-light align-items-center">
                                                    Rate (₹)
                                                </div>
                                            </th>
                                            <th scope="col" style="width: 120px;">Quantity</th>
                                            <th scope="col" class="text-end" style="width: 150px;">Amount</th>
                                            <th scope="col" class="text-end" style="width: 105px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="newlink">

                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">
                                                <a href="javascript:new_link()" id="add-item"
                                                    class="btn btn-soft-secondary fw-medium"><i
                                                        class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <label for="note">Note (Optional)</label>
                                                <input type="text" class="form-control" name="note"
                                                    placeholder="Any Note..." id="note">
                                            </td>
                                        </tr>
                                        <td colspan="4">
                                        </td>
                                        <td colspan="2" class="p-0">
                                            <table
                                                class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                <tbody>



                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total Amount</th>
                                                        <td>
                                                            <input type="text" class="form-control bg-light border-0"
                                                                id="cart-total" placeholder="₹0.00" readonly=""
                                                                name="total_amount">
                                                        </td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">

                                                        <td>
                                                            <div class="col-xxl-12 col-md-12 mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-md w-100" value="">Submit
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
    let count = 0;
let products = [];

// Add new product row
function new_link() {
    const index = count++;

    const newRow = `
        <tr id="row-${index}" class="product-row">
            <th scope="row">${index + 1}</th>
            <td>
                <input type="text" class="form-control product-name" name="product_name[${index}]" data-index="${index}" placeholder="Product Name" required>
            </td>
            <td>
                <input type="number" class="form-control product-rate" name="product_rate[${index}]" data-index="${index}" step="0.01" placeholder="0.00" required>
            </td>
            <td>
                <div class="input-step">
                    <button type="button" class="minus" data-index="${index}">–</button>
                    <input type="number" class="product-qty" name="product_qty[${index}]" data-index="${index}" value="1" readonly>
                    <button type="button" class="plus" data-index="${index}">+</button>
                </div>
            </td>
            <td>
                <input type="text" class="form-control product-total" name="product_total[${index}]" data-index="${index}" value="₹0.00" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger delete-product" data-index="${index}">Delete</button>
            </td>
        </tr>
    `;

    $('#newlink').append(newRow);

    // Add to array
    products[index] = {
        id: index,
        name: '',
        rate: 0,
        qty: 1,
        total: 0
    };
}

// Update product total and array
function updateProduct(index) {
    const name = $(`.product-name[data-index="${index}"]`).val();
    const rate = parseFloat($(`.product-rate[data-index="${index}"]`).val()) || 0;
    const qty = parseInt($(`.product-qty[data-index="${index}"]`).val()) || 0;
    const total = rate * qty;

    products[index] = {
        id: index,
        name: name,
        rate: rate,
        qty: qty,
        total: total
    };

    $(`.product-total[data-index="${index}"]`).val(`₹${total.toFixed(2)}`);
    calculateTotals();
}

// Quantity increase/decrease
$(document).on('click', '.plus, .minus', function () {
    const index = $(this).data('index');
    const qtyInput = $(`.product-qty[data-index="${index}"]`);
    let qty = parseInt(qtyInput.val());

    if ($(this).hasClass('plus')) qty++;
    else if (qty > 1) qty--;

    qtyInput.val(qty);
    updateProduct(index);
});

// Name & rate change update
$(document).on('input', '.product-name, .product-rate', function () {
    const index = $(this).data('index');
    updateProduct(index);
});

// Delete product
$(document).on('click', '.delete-product', function () {
    const index = $(this).data('index');
    $(`#row-${index}`).remove();
    delete products[index]; // Remove from array
    calculateTotals();
});

// Master total calculation
function calculateTotals() {
    let subtotal = 0;
    products.forEach(p => {
        if (p) subtotal += p.total;
    });



    let finalTotal = subtotal;

    $('#cart-total').val(`₹${finalTotal.toFixed(2)}`);
}

$(document).ready(function () {
    calculateTotals(); // Initial

});
</script>






@endsection
