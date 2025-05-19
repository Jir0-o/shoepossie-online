

<?php $__env->startSection('content'); ?>

<style>
    .sidebar {
        max-height: 100vh;
        overflow-y: auto;
    }  
    .sidebar::-webkit-scrollbar {
        width: 4px;
        background: transparent;
        display: none;
    }  
    .sidebar::-webkit-scrollbar-thumb {
        width: 4px;
        background: #0ea12e;
    }  
    .main-panel {
        background-color: #eeeeff;
    }
    .select2-selection.select2-selection--single {
        padding-block: 0;
    }
    .barcode-scanner {
        width: 200px;
    }
    .flex-box {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 120px);
    }
    .flex-box > div {
        flex: 1 1 auto;
    }
    .flex-box .card-sm {
        flex: 1 1 50px;
    }
    .table td {
        font-size: 10px;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #ffffff; 
    }
    .table tbody tr:nth-child(even) {
        background-color: #e4dddd; 
        color: #0c0c0c; 
    }
    .table td, .table th {
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="container-scroller">
    <?php echo $__env->make('dashboard.pertials.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles light"></div>
                <div class="tiles dark"></div>
            </div>
        </div>
        <?php echo $__env->make('dashboard.pertials.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <form action="<?php echo e(route('backoffice.store-sales')); ?>" id="form_submit" method="post" target="_blank" enctype="multipart/form-data">

                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>

                <?php echo csrf_field(); ?>
                <div class="row p-3">
                    <div class="col-sm-5">
                        <div class="form-row"> 
                                <div class="col"> <select data-placeholder="Search by Barcode" class="form-control select2-plugin" name="barcode_search" id="barcode_search"></select> 
                            </div> 
                                <div class="col"> <select data-placeholder="Search by Product Name" class="form-control select2-plugin" name="product_name_search" id="product_name_search"></select>
                            </div> 
                        </div>
                        <div class="flex-box">
                            <div class="card mt-4 card-sm">
                                <div class="card-body p-2">
                                    <h6>Product</h6>
                                    <div class="table-responsive">
                                        <table class="table" id="myTable">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <td class="p-2">
                                                        Product Name
                                                    </td>
                                                    <td class="p-2">
                                                        Color/Size
                                                    </td>
                                                    
                                                    <td class="p-2">
                                                        In Stock
                                                    </td>
                                                    <td class="p-2" id="type_name">
                                                        Sales Price
                                                    </td>
                                                    <td class="p-2">
                                                        Action
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="sales-cat-wise-items" style="font-weight: bold;" class="bg-light text-danger">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                            <div class="card mt-4">
                                <div class="card-body p-2">
                                    <h6>Sold Items</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <td class="p-2">Product</td>
                                                    <td class="p-2 text-center">Price</td>
                                                    <td class="p-2 text-center">Qty</td>
                                                    <td class="p-2 text-center">Total</td>
                                                    <td class="p-2 text-center">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="temp-cart-items" class="clickAction">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                            <div class="card mt-3">
                                <div class="card-body p-2">
                                    <h6>Multi-payment Information</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <td class="p-2">Action</td>
                                                    <td class="p-2">Type</td>
                                                    <td class="p-2">Payable</td>
                                                    <td class="p-2">Paid</td>
                                                    <td class="p-2">Due</td>
                                                    <td class="p-2">Change</td>
                                                </tr>
                                            </thead>
                                            <tbody id="temp_payment"></tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="d-flex justify-content-between align-items-center p-2 bg-dark text-light">
                            <h4 class="m-0">Cart</h4>
                            <div class="d-flex" style="gap: 12px;">
                                <div class="barcode-scanner">
                                    <select data-placeholder="Scan Barcode" class="form-control select2-plugin" name="barcode" id="barcode">
                                    </select>
                                </div>
                                <a href="<?php echo e(route('backoffice.delete_sales_form')); ?>" class="btn btn-danger">
                                    Delete
                                </a>
                                <div id="hide_suspense">
                                    <div class="btn btn-warning float-right" id="add_suspense">
                                        Suspend
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="mobile_no">Customer Mobile No</label> 
                                    <input class="form-control" name="mobile_no" type="text" id="mobile_no" placeholder="Customer Mobile No" required />
                                    <input class="form-control" name="return_cart_id" id="return_cart_id" type="hidden"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="payment_type_id">Payment Type</label>
                                    <select name="payment_method_id" id="payment_type_id" class="form-control">
                                        <?php $__currentLoopData = $getCartPaymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getCartPaymentMethods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($getCartPaymentMethods->payment_method_id); ?>">
                                            <?php echo e($getCartPaymentMethods->payment_method); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr id="type_wise">
                                        </tr>
                                        <tr id="exchange_wize">
                                        </tr>
                                        <tr id="adjust_amount">
                                        </tr>
                                        <tr id="checque_no">
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="payable_amount">Payable Amount</label>
                                    <input class="form-control" type="text" style="color: red; font-weight: bold; background-color: yellow; text-align: end;" onfocus="this.select();" id="payable_amount" name="payable_amount" min="1" />
                                    <input class="form-control" type="hidden" style="color: red; font-weight: bold; background-color: yellow; text-align: end;" onfocus="this.select();" id="paid_amount" name="paid_amount" min="1" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="paid_amount">Sales Type</label>
                                    <select class="form-control" name="sales_type" id="sales_type">
                                        <option value="1" selected>Retail</option>
                                        <option value="2">Whole Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="disc">Discount</label>
                                    <input class="form-control" type="text" id="disc" name="discount" min="1" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-column mt-md-3">
                                    <button class="btn btn-primary" id="add_payment">
                                        Add Payment
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="payment-details">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Transaction Details</h4>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h6>
                                            Sub-total 
                                            <span class="fs-6">
                                                (Items: <span id="no_of_items"></span>, Quantity: <span id="total_quantity"></span>)
                                            </span> -
                                        </h6>
                                        <h4 id="subtotal"></h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                            <h6>
                                            VAT - 
                                            </h6>
                                            <h4 id="vat"></h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                            <h6>
                                            Discount - 
                                            </h6>
                                            <h4 id="discount"></h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h6>
                                            Payable -
                                        </h6>
                                        <h4 id="total"></h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h6>
                                            Paid Amount -
                                        </h6>
                                        <h4 style="color: #0ea12e;" id="paid"></h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h6>
                                            Due Amount -
                                        </h6>
                                        <h4 style="color: #c51a1a;" id="due"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column pt-3">
                            <button class="btn btn-primary" disabled id="complete" style="height: 76px;">
                                Complete
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<script src="<?php echo e(asset('assets/js/jquery/jquery-3.6.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery/selectize.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        

        $.ajax({
            url: "get_all_barcode",
            method: "GET",
            dataType: "json",
        success: function (barcodes) {
            // Assuming you have an input field with the id 'categoryInput'
            $("#barcode").empty();
            $("#barcode_search").empty();
            var stdhtml = "<option disabled selected> Barcode </option>";
            $.each(barcodes, function(key, value) {
                stdhtml+='<option value="'+value.barcode+'">'+ value.barcode +'</option>';
            });
            $("#barcode").append(stdhtml);
            $("#barcode_search").append(stdhtml);
        },
        error: function (error) {
            console.log(error)
            console.error('Error fetching categories', error);
        }
    });

            $.ajax({
            url: "get_all_product_names",
            method: "GET",
            dataType: "json",
            success: function (products) {
                $("#product_name_search").empty();
                var options = "<option disabled selected>Search by product name</option>";
                $.each(products, function (i, item) {
                    options += '<option value="' + item.barcode + '">' + item.product_material_name + '</option>';
                });
                $("#product_name_search").append(options);
            }
        });


        // Select Plugin
        $('.select2-plugin').select2();

        // $('body').addClass('sidebar-icon-only');

        $(document).on('click','#genarate', function (event) {
            event.preventDefault();
            // console.log('Hello');
            var sales_type = $("#sales_type").val();
            var product_material_id = $('#product_material_id').val();
            var article = $('#article').val();
            var batch = $('#batch').val();
            // if(!product_material_id){
            //   return  swal("Please Select Product!!","Error", "error");

            // }
            // if(!article){
            //    return swal("Please Select Article!!","Error", "error");
            // }
            // if(!batch){
            //     return swal("Please Select Batch!!","Error", "error");
            // }
            var data = {
                'product_material_id':product_material_id,
                'article':article,
                'batch':batch,
            }
            $('#sales-cat-wise-items').empty();
            $.ajax({
                url: "sales-batch-wise",
                method: "GET",
                data:data,
                dataType: "json",
                success: function(data) {
                    $.each(data, function(col, categoryWiseItem) {
                        var product_html = "<tr class='p-2'>"
                        product_html += "<td width='40%' class='p-2'>"
                        product_html += categoryWiseItem.product_material_name
                        product_html += "</td>"
                        product_html += "<td width='40%' class='p-2'>"
                        product_html += categoryWiseItem.colors_name+"/"+categoryWiseItem.size_name
                        product_html += "</td>"
                        // product_html += "<td width='20%' class='p-2'>"
                        // product_html += categoryWiseItem.store_name
                        // product_html += "</td>"
                        product_html += "<td width='20%' class='p-2'>"
                        product_html += categoryWiseItem.final_quantity
                        product_html += "</td>"
                        if(sales_type == 1){
                            product_html += "<td width='25%' class='text-right'>"
                            product_html += categoryWiseItem.sales_price
                            product_html += "</td>"
                        }else if(sales_type == 2){
                            product_html += "<td width='25%' class='text-right'>"
                            product_html += categoryWiseItem.wholesale_price
                            product_html += "</td>"
                        }
                        product_html += "<td width='10%' class='p-0'>"
                        product_html += "<a barcode_id='"+categoryWiseItem.barcode+"' color_id='"+categoryWiseItem.colors_id+"' size_id='"+categoryWiseItem.size_id+"' product_id='"+categoryWiseItem.product_material_id+"' stock_id='"+categoryWiseItem.stock_id+"' id='sales-product-item' value='" +
                            categoryWiseItem.purchase_details_id +
                            "' class='btn btn-success'>add</a>"
                        product_html += "</td>"
                        product_html += "</tr>"

                        $('#sales-cat-wise-items').append(product_html);
                    });
                }
            });

        });

        $(document).on('change','#barcode_search', function (event) {
            event.preventDefault();
            var sales_type = $("#sales_type").val();
            var barcode = $("#barcode_search").val();
            
            // if(!product_material_id){
            //   return  swal("Please Select Product!!","Error", "error");

            // }
            // if(!article){
            //    return swal("Please Select Article!!","Error", "error");
            // }
            // if(!batch){
            //     return swal("Please Select Batch!!","Error", "error");
            // }
            var data = {
                'barcode':barcode,
                
            }
            $('#sales-cat-wise-items').empty();
            $.ajax({
                url: "sales-barcode-wise",
                method: "GET",
                data:data,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $.each(data, function(col, categoryWiseItem) {
                        var product_html = "<tr class='p-2'>"
                        product_html += "<td width='40%' class='p-2'>"
                        product_html += categoryWiseItem.product_material_name
                        product_html += "</td>"
                        product_html += "<td width='40%' class='p-2'>"
                        product_html += categoryWiseItem.colors_name+"/"+categoryWiseItem.size_name
                        // if(categoryWiseItem.store_name){
                        //     product_html += "<td width='20%' class='p-2'>"
                        //     product_html += categoryWiseItem.store_name 
                        //     product_html += "</td>"
                        // }
                        // else{
                            //     product_html += "<td width='20%' class='p-2'>"
                            //     product_html += '' 
                            //     product_html += "</td>"
                        // }
                            product_html += "</td>"
                        product_html += "<td width='20%' class='p-2'>"
                        product_html += categoryWiseItem.final_quantity
                        product_html += "</td>"
                        if(sales_type == 1){
                            product_html += "<td width='25%' class='p-2'>"
                            product_html += categoryWiseItem.sales_price
                            product_html += "</td>"
                        }else if(sales_type == 2){
                            product_html += "<td width='25%' class='p-2'>"
                            product_html += categoryWiseItem.wholesale_price
                            product_html += "</td>"
                        }
                        product_html += "<td width='10%' class='p-0'>"
                        product_html += "<a barcode_id='"+categoryWiseItem.barcode+"' color_id='"+categoryWiseItem.colors_id+"' size_id='"+categoryWiseItem.size_id+"' product_id='"+categoryWiseItem.product_material_id+"' stock_id='"+categoryWiseItem.stock_id+"' id='sales-product-item' value='" +
                            categoryWiseItem.purchase_details_id +
                            "' class='btn btn-success'>add</a>"
                        product_html += "</td>"
                        product_html += "</tr>"

                        $('#sales-cat-wise-items').append(product_html);
                    });
                }
            });

        });

        $(document).on('change', '#product_name_search', function (event) {
            event.preventDefault();
            var barcode = $(this).val(); // since we used barcode as ID in Select2
            var sales_type = $("#sales_type").val();

            $.ajax({
                url: "sales-barcode-wise", 
                method: "GET",
                data: { barcode: barcode },
                dataType: "json",
                success: function(data) {
                    $('#sales-cat-wise-items').empty();
                    $.each(data, function(col, categoryWiseItem) {
                        var product_html = "<tr class='p-2'>"
                        product_html += "<td width='40%' class='p-2'>" + categoryWiseItem.product_material_name + "</td>"
                        product_html += "<td width='40%' class='p-2'>" + categoryWiseItem.colors_name + "/" + categoryWiseItem.size_name + "</td>"
                        product_html += "<td width='20%' class='p-2'>" + categoryWiseItem.final_quantity + "</td>"

                        if (sales_type == 1) {
                            product_html += "<td width='25%' class='p-2'>" + categoryWiseItem.sales_price + "</td>"
                        } else if (sales_type == 2) {
                            product_html += "<td width='25%' class='p-2'>" + categoryWiseItem.wholesale_price + "</td>"
                        }

                        product_html += "<td width='10%' class='p-0'>"
                        product_html += "<a barcode_id='" + categoryWiseItem.barcode +
                            "' color_id='" + categoryWiseItem.colors_id +
                            "' size_id='" + categoryWiseItem.size_id +
                            "' product_id='" + categoryWiseItem.product_material_id +
                            "' stock_id='" + categoryWiseItem.stock_id +
                            "' id='sales-product-item' value='" +
                            categoryWiseItem.purchase_details_id +
                            "' class='btn btn-success'>add</a>"
                        product_html += "</td>"
                        product_html += "</tr>"

                        $('#sales-cat-wise-items').append(product_html);
                    });
                }
            });
        });


        window.TempTransactionHelper = function(data) {
            $('#discount').empty();
            $('#total').empty();
            $('#paid').empty();
            $('#due').empty();
            $('#vat').empty();

            let totalPayable = data.getTotalCountPayment ? (data.totalPayable / data.getTotalCountPayment) : data.totalPayable;
            let totalPaidAmount = data.totalPaidAmount ?? 0;
            let dueAmount = Math.max(totalPayable - totalPaidAmount, 0);

            $('#discount').append(data.totalDiscount ?? 0);
            $('#total').append(totalPayable.toFixed(2));
            $('#paid').append(totalPaidAmount.toFixed(2));
            $('#due').append(dueAmount.toFixed(2));
            $('#vat').append(data.totalVat ?? 0);
            $('#payable_amount').val(dueAmount.toFixed(2));
        };

        window.TempPaymentHtmlHelper = function(data) {
            const button = document.getElementById('complete');
            if (button) button.disabled = false;

            let totalPayable = data.getTotalCountPayment ? (data.totalPayable / data.getTotalCountPayment) : data.totalPayable;
            let totalPaidAmount = data.totalPaidAmount ?? 0;
            let remainingDue = totalPayable;

            // Update paid input and button logic
            $('#paid_amount').val(totalPaidAmount);
            if ((totalPayable - totalPaidAmount) <= 0) {
                $('#sales_payment_add_button').empty();
            }

            $('#temp_payment').empty();
            let temp_payment_html = '';

            $.each(data.TempPaymentdata, function(indexInArray, item) {
                let previousDue = remainingDue;
                remainingDue -= item.paid_amount;

                // Calculate change properly
                let change = 0.00;
                if (remainingDue < 0) {
                    change = Math.abs(remainingDue);
                    remainingDue = 0.00; // Prevent negative display for due
                }

                temp_payment_html = `
                    <tr>
                        <td class="align-middle">
                            <a cart_temporary_payment_id="${item.cart_temporary_payment_id}" id="delete_temp_payment">
                                <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                            </a>
                        </td>
                        <td class="align-middle">${item.payment_method_symbol}</td>
                        <td class="align-middle">${previousDue.toFixed(2)}</td>
                        <td class="align-middle">${item.paid_amount.toFixed(2)}</td>
                        <td class="align-middle">${remainingDue.toFixed(2)}</td>
                        <td class="align-middle">${change.toFixed(2)}</td>
                    </tr>
                `;

                $('#temp_payment').append(temp_payment_html);
            });

            $('#payable_amount').val(remainingDue.toFixed(2));
            console.log("Total Due Remaining: " + remainingDue.toFixed(2));
        };


        window.ItemDataHelper = function(data) {

            // console.log("kk",data)

            var temp_cart_items_html = "";

            if (data.status == true) {
                var i = 1;
                $('#temp-cart-items').empty();
                $.each(data.cart_temporary_data, function(col, temp_cart_item) {
                    console.log(temp_cart_item);
                    var product_image = temp_cart_item.product_image.split(",")[0];
                    temp_cart_items_html += "<tr class='py-3' value='" + temp_cart_item
                        .temp_cart_item_id + "'>"
                    temp_cart_items_html +=
                        "<td class='p-2' width='40%'><input i='" + i++ +
                        "' id='temp_cart_id' name='temp_cart_id' type='hidden' value='" +
                        temp_cart_item
                        .temp_cart_id + "'/>"
                    temp_cart_items_html += temp_cart_item.barcode
                    // temp_cart_items_html += "<small>(" + temp_cart_item.colors_name + "/"+ temp_cart_item.size_name + ")</small>"
                    temp_cart_items_html += "</td>"
                        if(data.sales_type == 1){
                            temp_cart_items_html +="<td class='text-right' width='10%'><a id='sales_sales_price'>"+temp_cart_item.sales_price+"</a></td>"
                            temp_cart_items_html += "<td class='p-2' width='30%' class='text-right'>"
                            temp_cart_items_html += "<input class='form-control text-right'sales_sales_price='" +
                                temp_cart_item.sales_price + "' temp_cart_item_id='" + temp_cart_item
                                .temp_cart_item_id + "' data='sales_quantity" + i + "' value='" +
                                temp_cart_item.quantity +
                                "' type='number' id='sales_quantity'  name='quantity' min='1'>"
                            temp_cart_items_html += "</td>"
                        }else if(data.sales_type == 2){
                            temp_cart_items_html +="<td class='p-2' width='10%'><a id='sales_sales_price'>"+temp_cart_item.wholesale_price +"</a></td>"
                            temp_cart_items_html += "<td class='p-2' width='30%'>"
                            temp_cart_items_html += "<input class='form-control'sales_sales_price='" +
                                temp_cart_item.wholesale_price + "' temp_cart_item_id='" + temp_cart_item
                                .temp_cart_item_id + "' data='sales_quantity" + i + "' value='" +
                                temp_cart_item.quantity +
                                "' type='number' id='sales_quantity' name='quantity' min='1'>"
                            temp_cart_items_html += "</td>"
                        }

                    temp_cart_items_html += "<td class='text-right' width='10%'><a id='sales_quantity" +
                        i +
                        "' value='" +
                        temp_cart_item.sales_price + "'>" + temp_cart_item.temp_net_amount +
                        "</a></td>"
                    temp_cart_items_html += "<td width='10%'>"
                    temp_cart_items_html += "<a value='" + temp_cart_item
                        .temp_cart_item_id +
                        "' id='delete_tempcart'><i class='fa fa-trash' aria-hidden='true' style='color: red;'></i><a/>"
                    temp_cart_items_html += "</td>"
                    temp_cart_items_html += "</tr>"
                });

                $('#no_of_items').empty();
                $('#total_quantity').empty();
                $('#subtotal').empty();
                $('#discount').empty();
                $('#total').empty();
                $('#paid').empty();
                $('#due').empty();
                $('#vat').empty();

            }

            return temp_cart_items_html;
        }


        window.ItemTransactionHelper = function(data) {


            $('#no_of_items').empty();
            $('#total_quantity').empty();
            $('#subtotal').empty();
            $('#discount').empty();
            $('#total').empty();
            $('#paid').empty();
            $('#due').empty();
            $('#vat').empty();


            $('#no_of_items').append(data.transaction_data.items);
            $('#total_quantity').append(data.transaction_data.quantity);
            $('#subtotal').append(data.transaction_data.subtotal);
            $('#discount').attr("value", data.transaction_data.total_discount);
            $('#total').append(data.transaction_data.total_payable);
            $('#paid').append(data.transaction_data.paid_amount);
            $('#due').append(data.transaction_data.due_amount);
            $('#vat').append(data.transaction_data.vat);
            $('#paid_amount').attr("value", data.transaction_data.due_amount);
            $('#paid_amount').attr("temp_cart_id", data.transaction_data.temp_cart_id);
            $('#payable_amount').attr("value", data.transaction_data.due_amount);
            $('#payable_amount').attr("temp_cart_id", data.transaction_data.temp_cart_id);
            $('#disc').val(data.transaction_data.total_discount);




            return console.log(data.transaction_data);
        }



        //--------Fetch Category Sub Category ----------
        // $(document).on('click', '#sales-category', function(e) {
        //     var category_id = $(this).attr('value');
        //     $('#sales-cat-wise-items').empty();
        //     $('#all-sub-category').empty();
        //     $.ajax({
        //         url: 'sales-sub-category/'+category_id,
        //         type: "GET",
        //         data: {
        //             "_token": "<?php echo e(csrf_token()); ?>"
        //         },
        //         dataType: "json",
        //         success: function(data) {
        //             $.each(data, function(col, category) {
        //                 var catImage = category.sc_one_image;
        //                 var category_html = '<div class="col-3 col-lg-3 col-md-3 mb-1">'
        //                 category_html += '<a value="' + category.sc_one_id +
        //                     '" id="get-sales-subcategory" class="btn">'
        //                 category_html +=
        //                     '<img height="70px" width="75px" src="<?php echo e(asset('backend/images/CategoryWise/')); ?>' +
        //                     '/' + catImage + '" alt="' + catImage + '">'
        //                 category_html += '<div>'
        //                 category_html += '<div>' + category.sc_one_name + '</div>'
        //                 category_html += '</a></div></div>'
        //                 $('#all-sub-category').append(category_html);
        //             });
        //         }
        //     });
        // });
        // --------Fetch Category Wise Items With Ajax ----------
        $(document).on('click', '#get-sales-subcategory', function(e) {
            var sc_one_id = $(this).attr('value');
            var sales_type = $("#sales_type").val();
            $('#sales-cat-wise-items').empty();
            $.ajax({
                url: "sales-cat-wise-items-add/" + sc_one_id,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(col, categoryWiseItem) {
                        var product_html = "<tr class='p-2'>"
                        product_html += "<td width='40%' class='p-2'>"
                        product_html += categoryWiseItem.product_material_name
                        product_html += "</td>"
                        // product_html += "<td width='20%' class='p-2'>"
                        // product_html += categoryWiseItem.store_name
                        // product_html += "</td>"
                        product_html += "<td width='20%' class='p-2'>"
                        product_html += categoryWiseItem.final_quantity
                        product_html += "</td>"
                        if(sales_type == 1){
                            product_html += "<td width='25%' class='p-2'>"
                            product_html += categoryWiseItem.sales_price
                            product_html += "</td>"
                        }else if(sales_type == 2){
                            product_html += "<td width='25%' class='p-2'>"
                            product_html += categoryWiseItem.wholesale_price
                            product_html += "</td>"
                        }
                        product_html += "<td width='10%' class='p-0'>"
                        product_html += "<a product_id='"+categoryWiseItem.product_id+"' stock_id='"+categoryWiseItem.stock_id+"' id='sales-product-item' value='" +
                            categoryWiseItem.purchase_details_id +
                            "' class='btn btn-success'>add</a>"
                        product_html += "</td>"
                        product_html += "</tr>"

                        $('#sales-cat-wise-items').append(product_html);
                    });
                }
            });

        });


        //-------- Add Product To Temp Cart---------
        $(document).on('click', '#sales-product-item', function(e) {

            var purchase_details_id = $(this).attr('value');
            var stock_id = $(this).attr('stock_id');
            var product_id = $(this).attr('product_id');
            var temp_cart_id = $("#temp_cart_id").val();
            var sales_type = $("#sales_type").val();
            var color_id = $("#color_id").val();
            var size_id = $("#size_id").val();
            var msg;

            if (temp_cart_id) {
                msg = temp_cart_id;
            } else {
                msg = false;
            }
            $('#add-sales-items-to-temp').empty();
            $.ajax({
                url:'<?php echo e(route('backoffice.add-sales-items-to-temp-add')); ?>',
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "purchase_details_id": purchase_details_id,
                    "stock_id": stock_id,
                    "temp_cart_id": temp_cart_id,
                    "sales_type": sales_type,
                    "product_id": product_id,
                    "msg": msg
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if(data.stock_error == true){
                        swal(data.message,data.in_stock+' Products Available','error');
                        return ;
                    }

                    $('#temp-cart-items').append(ItemDataHelper(data));
                    ItemTransactionHelper(data);

                }
            });

        });

        //-------- Fetch Temp Cart Data On Reload---------
        var SESSION = {
            "LoggedUser": "<?php echo session()->get('LoggedUser'); ?>",
        };
        var login_id = SESSION.LoggedUser;
        var st=$("#sales_type").val();
        $.ajax({
            url: "get_sales_temp_cart_data-get/" + login_id +"/"+st,
            type: "GET",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            dataType: "json",
            success: function(data) {
                $('#temp-cart-items').append(ItemDataHelper(data));
                ItemTransactionHelper(data);
                if (data.IsPaymentExists) {
                    
                    
                    
                    TempPaymentHtmlHelper(data);
                    TempTransactionHelper(data);
                }

            }
        });
        //--------End Fetch Temp Cart Data On Reload---------

        //-------- Adjust Price On Sales Type Change---------
        $(document).on('change', '#sales_type', function(e) {
            e.preventDefault();
            var sales_type_id = $(this).val();
            var temp_cart_id = $("#temp_cart_id").val();
            $('#sales-cat-wise-items').empty();
            var msg;
            if (temp_cart_id) {
                msg = temp_cart_id;
            } else {
                msg = false;
            }

            if (sales_type_id == 2 ) {
                $("#type_name").empty();
                $("#type_name").append("Wholesale Price");
            } else {
                $("#type_name").empty();
                $("#type_name").append("Sales Price");
            }

            $.ajax({
                url: "sales-type-wise-price/" + sales_type_id+'/'+msg,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    $('#temp-cart-items').append(ItemDataHelper(data));
                    ItemTransactionHelper(data);
                }
            });
        });

        //-------- Adjust Price On Sales Quantity Change---------
        $(".clickAction").on('change', '#sales_quantity', function(e) {
            var data_id = "";
            var sales_price = ""
            var sales_quantity = $(this).val();

            var sales_price = $(this).attr('sales_sales_price');
            var temp_cart_item_id = $(this).attr('temp_cart_item_id');
            var data_id = $(this).attr('data');
            var sales_type = $("#sales_type").val();
            $("#" + data_id).empty()
            if(sales_quantity<=0){
                swal("Qnt Should Be Grater Then Zero","Fail","error");
                $('#no_of_items').empty();
                $('#total_quantity').empty();
                $('#subtotal').empty();
                $('#discount').empty();
                $('#total').empty();
                $('#paid').empty();
                $('#due').empty();
                $('#vat').empty();
                $('#paid_amount').attr("value", 0);
                $('#payable_amount').attr("value", 0);
                $('#disc').attr("value", 0);
                return ;
            }
            else
            { $.ajax({
                url: "price_calculation/" + temp_cart_item_id + "/" + sales_quantity + "/" +
                    sales_price +"/"+sales_type,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if(data.status){
                        var new_sales = data.cart_temporary_item.temp_net_amount;
                    $("#" + data_id).append(new_sales);
                    ItemTransactionHelper(data);
                    }
                    else
                    {
                        swal(data.fail,data.qty +" Products Available","error");
                    }
                }
            });}

        });


        //-------- change paid amount on discount change ---------
        $(document).on('blur', '#disc', function(e) {
            var paid_amount = $('#paid_amount').val();
            var discount = $(this).val();
            var subtotal = $('#subtotal').text();
            var vat = $('#vat').text();
            if(discount<0){
                swal("Discount Should Be Positive","Fail","error");
                return ;
            }
            else if(discount>(parseInt(subtotal)+parseInt(vat)))
            {
                swal("Discount Amount Can Not Exceed The Payable Amount","Fail","error");
                return ;
            }

            else if(/%$/.test(discount)){
                var getDiscountValue = parseFloat(discount)/100;   //input value  value =  0.1/100 = 0.1

                var dis = parseInt(subtotal)*getDiscountValue;
                $('#paid_amount').attr("value", parseInt(subtotal)+parseInt(vat)-dis);
                $('#payable_amount').attr("value", parseInt(subtotal)+parseInt(vat)-dis);

            }
            else{
                $('#paid_amount').attr("value", parseInt(subtotal)+parseInt(vat)-discount);
                $('#payable_amount').attr("value", parseInt(subtotal)+parseInt(vat)-discount);

            }


        });

        //-------- Delete Temp Cart ---------
        $(".clickAction").on('click', '#delete_tempcart', function(e) {
            e.preventDefault();
            var temp_cart_item_id = $(this).attr('value');
            var sales_type = $("#sales_type").val();
            $.ajax({
                url: "delete_sales_temp_cart_item-delete/" + temp_cart_item_id+"/"+sales_type,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data.sss)
                    $('#temp-cart-items').append(ItemDataHelper(data));
                    ItemTransactionHelper(data);
                }
            });
        });



        //-------- Create Temp Payment ---------
        $(document).on('click', '#add_payment', function(e) {

            e.preventDefault();

            var paid_amount = parseFloat($('#payable_amount').val());
            var discount = $('#disc').val();
            var subtotal = $('#subtotal').text();
            if (paid_amount <= 0 || isNaN(paid_amount)) {
                swal("No Payment Required", "Payable amount is already settled.", "info");
                return;
            }
            if(/%$/.test(discount)){
                var getDiscountValue = parseFloat(discount)/100;   //input value  value =  0.1/100 = 0.1
                var dis = parseInt(subtotal)*getDiscountValue;
                discount = dis;
            }
            var vat = $('#vat').text();


            if(!discount){
                discount=0;
            }
            //check negative value
            else if(discount<0){
                swal("Discount Should Be Positive","Fail","error");
                return ;
            }
            else if(discount>(parseInt(subtotal)+parseInt(vat)))
            {
                swal("Discount Amount Can Not Exceed The Payable Amount","Fail","error");
                return ;
            }

            if(paid_amount<0){
                swal("Paid Amount Should Be Positive","Fail","error");
                return ;
            }
            var payment_type_id = $('#payment_type_id').val();
            var bank_name = $('#bank_name').val();
            var cheque_no = $('#cheque_no').val();
            var transaction_no = $('#transaction_no').val();
            if(payment_type_id == 2){
                if(!bank_name){
                    swal('Bank name field is Required !!','Validation Error','error')
                }
                if(!cheque_no){
                    swal('Cheque No field is Required !!','Validation Error','error')
                }
            }else if(payment_type_id >= 3 && payment_type_id != 9){
                if(!transaction_no){
                    swal('Transaction No field is Required !!','Validation Error','error')
                }
            }
            var temp_cart_id = $("#paid_amount").attr("temp_cart_id");
            var sales_type = $("#sales_type").val();
            var adjust_amount_input = $("#adjust_amount_input").val();

            $.ajax({
                url: '<?php echo e(route('backoffice.store-sales-temp-payment')); ?>',
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "paid_amount": paid_amount,
                    "discount": discount,
                    "payment_type_id": payment_type_id,
                    "temp_cart_id": temp_cart_id,
                    "sales_type": sales_type,
                    "payment_type_id": payment_type_id,
                    "adjust_amount_input": adjust_amount_input,
                },
                dataType: "json",
                success: function(data) {
                    if(data.TempPaymentdata.due_amount<=0){
                    $('#add_payment').prop('disabled', true);
                $('#sales_payment_add_button').empty();
            }

            // console.log(data.TempPaymentdata.due_amount);
                    TempPaymentHtmlHelper(data);
                    TempTransactionHelper(data);
                }
            });
        });

        //-------- Suspend a cart ---------
        $(document).on('click', '#add_suspense', function(e) {
            e.preventDefault();

            var temp_cart_id = $("#temp_cart_id").val();
            var waiter_id = 1;
            var sales_type = $("#sales_type").val();
            $.ajax({
                url: "add_suspense/" + temp_cart_id + '/' + waiter_id + '/' + sales_type,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {

                    GetSuspenseDataHelper();

                    $('#temp-cart-items').empty();
                    $('#no_of_items').empty();
                    $('#total_quantity').empty();
                    $('#subtotal').empty();
                    $('#discount').empty();
                    $('#total').empty();
                    $('#paid').empty();
                    $('#due').empty();
                    $('#vat').empty();
                    $('#paid_amount').attr("value", 0);
                    $('#payable_amount').attr("value", 0);
                    $('#disc').attr("value", 0);
                    $("#table_no").attr('value', "");
                    $("#barcode").attr('value', null).focus();
                }
            });
        });

        //-------- Fetch All Suspended Items ---------
        window.GetSuspenseDataHelper = function() {
            $.ajax({
                url: "get-suspended-items",
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    $("#suspended_items").empty();
                    $("#suspended_items").append(
                        "<option selected disabled>SUSPENDED ITEMS</option>"
                    );
                    $.each(data.suspend_data, function(col, items) {
                        var suspended_items_html =
                            "<option value='" + items
                            .temp_cart_id +
                            "'>" + items.temp_cart_id +
                            "</option/>";
                        $("#suspended_items").append(
                            suspended_items_html);
                    });
                }
            });
        }
        GetSuspenseDataHelper();

        //-------- Fetch Suspended Item Wise Data ---------
        $(document).on('change', '#suspended_items', function(e) {

            var cart_item_id = $(this).val();
            $("#table_no").attr('value', "");
            $.ajax({
                url: "get_suspended_data/" + cart_item_id,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    GetSuspenseDataHelper();
                    $('#temp-cart-items').append(ItemDataHelper(data));
                    ItemTransactionHelper(data);
                }
            });

        });

        //-------- Insert Data To temp Cart With barcode------------
        $(document).on('change', '#barcode', function(e) {
            e.preventDefault();
            var barcode = $(this).val();
            var temp_cart_id = $("#temp_cart_id").val();
            console.log(temp_cart_id)
            var sales_type = $("#sales_type").val();
            var msg;
            if (temp_cart_id) {
                msg = temp_cart_id;
            } else {
                msg = false;
            }
            $('#add-sales-items-to-temp').empty();
            $.ajax({
                url: "add-sales-items-with-barcode/" + barcode + '/' + msg+"/"+sales_type,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data.message)
                    // console.log(data.also)
                    if(data.barcode_error){
                        swal(data.message,"Error","error");
                    }
                    if(data.stock_error == true){
                        swal(data.message,data.in_stock+' Products Available','error');
                        return ;
                    }

                    $('#temp-cart-items').append(ItemDataHelper(data));
                    ItemTransactionHelper(data);
                    if (data.IsPaymentExists) {
                        TempPaymentHtmlHelper(data);
                        TempTransactionHelper(data);
                    }
                    $('#barcode').val('');
                    $('#barcode').select2('open');
                }
            });
        });


        // enter event 
        $("#mobile_no").keydown(function (e) {
            if (e.keyCode == 13) {
                $('#disc').focus();
            }
        });

        $("#disc").keydown(function (e) {
            if (e.keyCode == 13) {
                const amount = $('#paid_amount').val();
                setTimeout(function() {
                    $('#paid_amount').focus();

                }, 300);
                
            }
        });

        $("#paid_amount").keydown(function (e) {
            if (e.keyCode == 13) {
                var childCount = $("#temp_payment").children().length
                if(childCount){
                    console.log("yyyy");
                    $('#complete').click();  

                }
                else{
                    console.log("test");
                    $('#add_payment').click();
                }
            }
        });
        


        $(document).on('click', '#delete_temp_payment', function(e) {
            e.preventDefault();
            var cart_temporary_payment_id = $(this).attr("cart_temporary_payment_id");

            $.ajax({
                url: "delete_temporary_payment/" + cart_temporary_payment_id,
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    if (data.deleted) {
                        // var add_payment_button =
                        //     '<div class="btn btn-primary" id="add_payment">Add Payment</div>'
                        // $('#sales_payment_add_button').append(add_payment_button);
                        // $('#temp_payment').empty();
                        TempPaymentHtmlHelper(data);
                        TempTransactionHelper(data);

                    }

                }
            });
        });

        $("#payment_type_id").on("change",function(){
            $("#type_wise").empty();
            $("#checque_no").empty();
            $("#exchange_wize").empty();
            $("#adjust_amount").empty();
            // $("#return_cart_id").empty();

            var mode_type = $(this).val();
            var mfd="";
            var mfc="";
            if(mode_type == 2){
                        mfd+='<td>Bank Name:</td>'
                        mfd+='<td>'
                        mfd+='<input placeholder="Bank Name" type="text" id="bank_name" class="form-control mt-2" name="bank_name" />'
                        mfd+='</td>'

                        mfc+='<td>Checque No</td>'
                        mfc+='<td>'
                        mfc+='<input placeholder="Checque No" type="text" id="cheque_no" class="form-control mt-2" name="cheque_no"/>'
                        mfc+='</td>'
                    $("#type_wise").append(mfd);
                    $("#checque_no").append(mfc);
            }  else if(mode_type >=3 && mode_type != 9){
                        mfd+='<td>Transaction No</td>'
                        mfd+='<td>'
                        mfd+='<input placeholder="Transaction No" type="text" id="transaction_no" class="form-control mt-2" name="transaction_no"/>'
                        mfd+='</td>'
                    $("#type_wise").append(mfd);
            }
            else if(mode_type == 9){
                        mfd+='<td>Mobile No</td>'
                        mfd+='<td>'
                        mfd+=`
                        <select name="mobile_number"
                                            id="mobile_number" class="form-control">
                                            <option selected disabled value="">Select</option>
                        </select>
                        `
                        mfd+='</td>'
                        $("#type_wise").append(mfd);
                        get_consumer_login()

            }
        });
        function get_consumer_login(){
            $.ajax({
            url: "get-consumer",
            method: "GET",
            dataType: "json",
            success: function (response) {
                $('#mobile_number').empty();
                    let insertData = '';
                    insertData += ' <option selected disabled value="">Select</option>';
                $.each(response.cartItemReturn, function (indexInArray, valueOfElement) {
                    insertData+='<option  value="'+valueOfElement.login_id+'">'+valueOfElement.mobile_no+'</option>'
                });
                $('#mobile_number').append(insertData)
                // console.log(response.ConsumerLogin);
            }
            });
        }
        get_consumer_login()

        $('#form_submit').submit(function(event) {
            setTimeout(function() {
        location.reload();
    }, 1000);
        });


        $(document).on('change','#mobile_number', function () {
            var mobile_number = $(this).val();
            // console.log(mobile_number);
            $.ajax({
                url: "get-return-product/" + mobile_number,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    // console.log(response.cartItemReturn);
                    $('#exchange_wize').empty();
                    $('#adjust_amount').empty();
                    let insert_Data = '';
                    let adjust_amount = '';
                    insert_Data+='<td>Mobile No</td>'
                    // insert_Data+='<td>Mobile No</td>'
                    insert_Data+='<td>'
                    insert_Data +='<select class="form-control" name="cart_item_id[]" id="select_item_id" multiple>'
                        $.each(response.cartItemReturn, function (indexInArray, item) {
                        insert_Data +='<option  value="'+item.cart_id+'">'+item.barcode+'</option>'
                        });
                    insert_Data +='</select>';
                    insert_Data+='</td>'


                    adjust_amount+='<td>Adjust Amount</td>'
                    // adjust_amount+='<td>Mobile No</td>'
                    adjust_amount+='<td>'
                    adjust_amount +='<input class="form-control" name="adjust_amount_input" id="adjust_amount_input" multiple/>'
                    adjust_amount+='</td>'
                    $('#exchange_wize').append(insert_Data);
                    $('#adjust_amount').append(adjust_amount);
                }
            });
        });

    });

    // $('#select_item_id').change(function (e) {
    //     e.preventDefault();
    //     console.log('Hello World');
    // });

    $(document).on('click','#select_item_id', function () {
        // console.log('Hello World');
        var cart_item_id = $(this).val();
        // console.log(cart_item_id);
        var item_id =[];
            item_id=$(this).val();
        var paid_amount = $('#paid_amount').val();
        var discount = $(this).val();
        var subtotal = $('#subtotal').text();
        var vat = $('#vat').text();
        $("#return_cart_id").empty();
        $("#return_cart_id").val(cart_item_id);


        $.ajax({
            url: "get-return-amount/" + cart_item_id,
            type: "GET",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            dataType: "json",
            success:function(data)
            {       console.log(data);

                    $('#adjust_amount_input').val(0)
                    $('#adjust_amount_input').val(data.getTotalPrice)
                    $('#paid_amount').attr("value", data.getTotalPrice);
                    $('#payable_amount').attr("value", data.getTotalPrice);


                    console.log(data.getTotalPrice);
                    // $("#quantity").val(quantity);
                    // $("#get_total_amount").val(total_amount);
                    // $("#get_non_refundAble").val(non_refundAble);
                    // $("#get_refundAble_amount").val(refundAble_amount);
                }
        });
    });

    function test() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shoepossie-Online\resources\views/dashboard/salesNew/salesForm.blade.php ENDPATH**/ ?>