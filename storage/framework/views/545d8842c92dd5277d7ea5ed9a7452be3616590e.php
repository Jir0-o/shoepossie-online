



<?php $__env->startSection('content'); ?>

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

                <div class="content-wrapper">

                    <div class="page-header">

                        <h3 class="page-title">Sales Report</h3>

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="#">Reports</a></li>

                                <li class="breadcrumb-item active" aria-current="page"> Sales Report </li>

                            </ol>

                        </nav>

                    </div>

                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="m-0" for="from">From: </label>

                                <input id="from" type="date" class="form-control" placeholder="From">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="m-0" for="date">To: </label>

                                <input id="to" type="date" class="form-control" placeholder="To">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="m-0" for="singledate">Specific Date: </label>

                                <input id="singledate" type="date" class="form-control" placeholder="Date">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="m-0" for="Customer">Customer: </label>

                                <input id="Customer" type="text" class="form-control" placeholder="Customer">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="m-0" for="Due">Due Amount: </label>

                                <input id="Due" type="number" class="form-control" placeholder="Due">

                            </div>

                        </div>

                    </div>

                    <p class="m-0">

                        <strong>Note:</strong> This form does not need to be submitted. Simply enter your values in any field to view your results.

                    </p>

                    <div class="mb-4" id="error"></div>

                    <div id="printable" class="card p-4">

                        <div class="d-flex justify-content-between align-items-center pb-3">

                            <h4 class="m-0">SALES REPORT</h4>

                            <button type="button" class="print no-print btn btn-primary btn-icon-text">

                                <i class="mdi mdi-printer btn-icon-append"></i> Print

                            </button>

                        </div>

                        <div class="table-responsive d-block">

                            <table class="table table-bordered table-striped">

                                <thead class="table-dark">

                                    <tr>

                                        <th class="text-center p-2">SL</th>

                                        <th class="text-center p-2">Date</th>

                                        <th class="text-center p-2">Order No</th>

                                        <th class="text-center p-2">Customer</th>

                                        <th class="text-center p-2">Bill Amount</th>

                                        <th class="text-center p-2">Discount</th>

                                        <th class="text-center p-2">Vat</th>

                                        <th class="text-center p-2">Payable</th>

                                        <th class="text-center p-2">Paid</th>

                                        <th class="text-center p-2">Due</th>

                                        <th class="text-center p-2">Profit</th>

                                    </tr>

                                </thead>

                                <tbody id="sales">



                                </tbody>

                                <tfoot id="summary" class="summary-print">



                                </tfoot>

                            </table>

                        </div>

                    </div>

                    <!-- main-panel ends -->

                </div>

                <!-- page-body-wrapper ends -->

            </div>

            <style>

                @media print {

                    .summary-print {

                        display: table-row-group;

                        page-break-before: always;

                    }



                    .no-print {

                        display: none;

                    }

                }

            </style>

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"

                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

            </script>



            <script type="text/javascript">

                $(document).ready(function() {

                    var nodata='<tr><td colspan="11" class="text-center"><p>Select Date For Result</p></td></tr>'

                    $('#sales').append(nodata);

                    $("#error").empty();



                    $(document).on('change', '#singledate', function(e) {

                        var singledate=$(this).val();

                        console.log(singledate);

                        $('#sales').empty();

                        $('#summary').empty();

                         $("#error").empty();

                        $.ajax({

                                url: 'single-date-sales/'+singledate,

                                type: "GET",

                                data: {

                                    "_token": "<?php echo e(csrf_token()); ?>",

                                },

                                dataType: "json",

                                success: function(data) {
                                    var i=0;

                                    var dshtml;

                                    console.log(data);

                                    $.each(data.singleDateSales, function(col, dsdata) {

                                        i=i+1;

                                        dshtml='<tr>'

                                            dshtml+='<td class="text-center p-2">'+ i +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_date.slice(0, 10) +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_id +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.mobile_no +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_cart_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_discount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.vat_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_payable_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.paid_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.due_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.net_profit +'</td>'

                                        dshtml+='</tr>';

                                        $('#sales').append(dshtml);

                                    });



                                   var summary_data='<tr class="h4 bg-secondary">'

                                            summary_data+='<td colspan="2">Summary</td>'

                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'

                                            summary_data+='<td></td>'

                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'

                                            summary_data+='<td>'+ data.summary.discount +'</td>'

                                            summary_data+='<td>'+ data.summary.vat +'</td>'

                                            summary_data+='<td>'+ data.summary.payable +'</td>'

                                            summary_data+='<td>'+ data.summary.paid +'</td>'

                                            summary_data+='<td>'+ data.summary.due +'</td>'

                                            summary_data+='<td>'+ data.summary.profit +'</td>'

                                        summary_data+='</tr>';

                                    $('#summary').append(summary_data);



                                }



                            });

                    });



                    $(document).on('change', '#from', function(e) {

                        $('#sales').empty();

                        $('#summary').empty();

                        var from=$("#from").val();

                        var to=$("#to").val();

                        if(!to){

                            $("#error").append('<div class="alert alert-danger"> To Date Is Required</div>');

                            return;

                        }

                        if(!from){

                            $("#error").append('<div class="alert alert-danger"> From Date Is Required</div>');

                            return;

                        }



                        $.ajax({

                                url: 'multi-date-sales/'+from+'/'+to,

                                type: "GET",

                                data: {

                                    "_token": "<?php echo e(csrf_token()); ?>",

                                },

                                dataType: "json",

                                success: function(data) {

                                    console.log(data);

                                    var i=0;

                                    var dshtml;

                                    console.log(data);

                                    $.each(data.singleDateSales, function(col, dsdata) {

                                        i=i+1;

                                        dshtml='<tr>'

                                            dshtml+='<td class="text-center p-2">'+ i +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_date.slice(0, 10) +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_id +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.mobile_no +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_cart_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_discount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.vat_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_payable_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.paid_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.due_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.net_profit +'</td>'

                                        dshtml+='</tr>';

                                        $('#sales').append(dshtml);

                                    });



                                    var summary_data='<tr class="h4 bg-secondary">'

                                            summary_data+='<td colspan="2">Summary</td>'

                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'

                                            summary_data+='<td></td>'

                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'

                                            summary_data+='<td>'+ data.summary.discount +'</td>'

                                            summary_data+='<td>'+ data.summary.vat +'</td>'

                                            summary_data+='<td>'+ data.summary.payable +'</td>'

                                            summary_data+='<td>'+ data.summary.paid +'</td>'

                                            summary_data+='<td>'+ data.summary.due +'</td>'

                                            summary_data+='<td>'+ data.summary.profit +'</td>'

                                        summary_data+='</tr>';

                                    $('#summary').append(summary_data);



                                }



                            });

                    });

                    $(document).on('change', '#to', function(e) {

                        $('#sales').empty();

                        $('#summary').empty();

                        var from=$("#from").val();

                        var to=$("#to").val();

                        if(!to){

                            $("#error").append('<div class="alert alert-danger"> To Date Is Required</div>');

                            return;

                        }

                        if(!from){

                            $("#error").append('<div class="alert alert-danger"> From Date Is Required</div>');

                            return;

                        }



                        $.ajax({

                                url: 'multi-date-sales/'+from+'/'+to,

                                type: "GET",

                                data: {

                                    "_token": "<?php echo e(csrf_token()); ?>",

                                },

                                dataType: "json",

                                success: function(data) {

                                    console.log(data);

                                    var i=0;

                                    var dshtml;

                                    console.log(data);

                                    $.each(data.singleDateSales, function(col, dsdata) {

                                        i=i+1;

                                        dshtml='<tr>'

                                            dshtml+='<td class="text-center p-2">'+ i +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_date.slice(0, 10) +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_id +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.mobile_no +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_cart_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_discount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.vat_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_payable_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.paid_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.due_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.net_profit +'</td>'

                                        dshtml+='</tr>';

                                        $('#sales').append(dshtml);

                                    });



                                    var summary_data='<tr class="h4 bg-secondary">'

                                            summary_data+='<td colspan="2">Summary</td>'

                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'

                                            summary_data+='<td></td>'

                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'

                                            summary_data+='<td>'+ data.summary.discount +'</td>'

                                            summary_data+='<td>'+ data.summary.vat +'</td>'

                                            summary_data+='<td>'+ data.summary.payable +'</td>'

                                            summary_data+='<td>'+ data.summary.paid +'</td>'

                                            summary_data+='<td>'+ data.summary.due +'</td>'

                                            summary_data+='<td>'+ data.summary.profit +'</td>'

                                        summary_data+='</tr>';

                                    $('#summary').append(summary_data);



                                }



                            });

                    });





                    $(document).on('change','#Customer', function (event) {

                        var customerdata =  $(this).val();

                        // console.log(data);

                        $('#sales').empty();

                        $('#summary').empty();

                        $("#error").empty();

                        $.ajax({

                                url: 'customer-mobile/'+customerdata,

                                type: "GET",

                                data: {

                                    "_token": "<?php echo e(csrf_token()); ?>",

                                },

                                dataType: "json",

                                success: function(data) {

                                    var i=0;

                                    var dshtml;

                                    console.log(data);

                                    $.each(data.singleDateSales, function(col, dsdata) {

                                        i=i+1;

                                        dshtml='<tr>'

                                            dshtml+='<td class="text-center p-2">'+ i +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_date.slice(0, 10) +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_id +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.mobile_no +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_cart_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_discount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.vat_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_payable_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.paid_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.due_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.net_profit +'</td>'

                                        dshtml+='</tr>';

                                        $('#sales').append(dshtml);

                                    });



                                   var summary_data='<tr class="h4 bg-secondary">'

                                            summary_data+='<td colspan="2">Summary</td>'

                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'

                                            summary_data+='<td></td>'

                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'

                                            summary_data+='<td>'+ data.summary.discount +'</td>'

                                            summary_data+='<td>'+ data.summary.vat +'</td>'

                                            summary_data+='<td>'+ data.summary.payable +'</td>'

                                            summary_data+='<td>'+ data.summary.paid +'</td>'

                                            summary_data+='<td>'+ data.summary.due +'</td>'

                                            summary_data+='<td>'+ data.summary.profit +'</td>'

                                        summary_data+='</tr>';

                                    $('#summary').append(summary_data);



                                }



                            });

                    });



                    $(document).on('change','#Due', function (event) {

                        var due =  $(this).val();

                        console.log(due);

                        $('#sales').empty();

                        $('#summary').empty();

                        $("#error").empty();

                        $.ajax({

                                url: 'due-list/'+due,

                                type: "GET",

                                data: {

                                    "_token": "<?php echo e(csrf_token()); ?>",

                                },

                                dataType: "json",

                                success: function(data) {

                                    var i=0;

                                    var dshtml;

                                    console.log(data);

                                    $.each(data.singleDateSales, function(col, dsdata) {

                                        i=i+1;

                                        dshtml='<tr>'

                                            dshtml+='<td class="text-center p-2">'+ i +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_date.slice(0, 10) +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.cart_id +'</td>'

                                            dshtml+='<td class="text-center p-2">'+ dsdata.mobile_no +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_cart_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_discount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.vat_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.total_payable_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.paid_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.due_amount +'</td>'

                                            dshtml+='<td class="text-end p-2">'+ dsdata.net_profit +'</td>'

                                        dshtml+='</tr>';

                                        $('#sales').append(dshtml);

                                    });



                                   var summary_data='<tr class="h4 bg-secondary">'

                                            summary_data+='<td colspan="2">Summary</td>'

                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'

                                            summary_data+='<td></td>'

                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'

                                            summary_data+='<td>'+ data.summary.discount +'</td>'

                                            summary_data+='<td>'+ data.summary.vat +'</td>'

                                            summary_data+='<td>'+ data.summary.payable +'</td>'

                                            summary_data+='<td>'+ data.summary.paid +'</td>'

                                            summary_data+='<td>'+ data.summary.due +'</td>'

                                            summary_data+='<td>'+ data.summary.profit +'</td>'

                                            summary_data+='<td></td>'

                                        summary_data+='</tr>';

                                    $('#summary').append(summary_data);



                                }



                            });





                    });



                    //print Sales  Report



                    $("#printable").find('.print').on('click', function() {

                        $.print("#printable");

                    });



                });

            </script>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shoepossie-Online\resources\views/possie/reports/salesReport.blade.php ENDPATH**/ ?>