<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<?php
    $user_id = session()->get('LoggedUser');
    $user_data = \App\Models\BackofficeLogin::join('backoffice_role', 'backoffice_role.role_id', '=', 'backoffice_login.role_id')
        ->where('login_id', $user_id)
        ->first();
    $banner_Information= \App\Models\BannerInformation::first();
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center mb-5 mt-3">
        <a class="sidebar-brand brand-logo" href="<?php echo e(route('backoffice.home')); ?>"><img style="height:100px; width:100px;"
                src="<?php echo e($banner_Information->banner_logo); ?>" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="<?php echo e(route('backoffice.home')); ?>"><img
                src="<?php echo e($banner_Information->banner_logo); ?>" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="<?php echo e(route('backoffice.home')); ?>" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?php echo e(asset('backend/images/profile_picture/' . $user_data->user_image)); ?>" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2"><?php echo e($user_data->full_name); ?></span>
                    <span class="font-weight-normal"><?php echo e($user_data->role_name); ?></span>
                </div>
                <!--<span class="badge badge-danger text-white ml-3 rounded">3</span>-->
            </a>
        </li>
        <?php if($user_data->role_id == 1 || $user_data->role_id == 2): ?>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('backoffice.home')); ?>">
                    <i class="mdi mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('backoffice.salesNew')); ?>">
                    <i class="mdi mdi mdi-cart menu-icon"></i>
                    <span class="menu-title">Sales Invoice</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('backoffice.purchaseNew')); ?>">
                    <i class="mdi mdi mdi-shopping-outline menu-icon"></i>
                    <span class="menu-title">Purchase Invoice</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                    aria-controls="ui-sales">
                    <i class="mdi mdi-receipt menu-icon"></i>
                    <span class="menu-title">Sales</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-sales">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.suspended_orders')); ?>">
                                Ordered Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.daily_sales_report')); ?>">
                                Daily Sales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all_sales_report')); ?>">
                                All Sales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.accounts-receivable')); ?>">
                                Accounts Receivable</a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-purchase" aria-expanded="false"
                    aria-controls="ui-purchase">
                    <i class="mdi mdi-home-import-outline menu-icon"></i>
                    <span class="menu-title">Purchase</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-purchase">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(asset('backoffice/dailyPurchase')); ?>">
                                Daily Purchase
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(asset('backoffice/allPurchase')); ?>">
                                All Purchase
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.accounts-payable')); ?>">
                                Accounts Payable</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-Account" aria-expanded="false"
                    aria-controls="ui-Account">
                    <i class="fa-solid fa-money-check menu-icon"></i>
                    <span class="menu-title">Accounts information</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-Account">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.supplier-payment')); ?>">
                                Supplier Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.customer-payment')); ?>">
                                Customer Payment</a>
                        </li>
                        
                        
                        
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.customer-ledger')); ?>">
                                Customer Ledger</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.supplier-ledger')); ?>">
                                Supplier Ledger</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-Payment" aria-expanded="false"
                    aria-controls="ui-Payment">
                    <i class="mdi mdi-bank menu-icon"></i>
                    <span class="menu-title">Bank & Payments</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-Payment">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.bank-actions')); ?>">
                                Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.trx-reports')); ?>">
                            Bank Transactions</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.payment-report')); ?>">
                            All Payment Report</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false"
                    aria-controls="ui-reports">
                    <i class="mdi mdi-file-chart menu-icon"></i>
                    <span class="menu-title">Reports</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-reports">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salesReport')); ?>">
                            Sales Report</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salesSummaryReport')); ?>">
                            Sales Summary Report</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.purchaseReport')); ?>">
                            Purchase Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expenseReport')); ?>">
                            Expense Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.profitReport')); ?>">
                                Profit Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.income-statement')); ?>">
                            Cash Flow Statement</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-stock" aria-expanded="false"
                    aria-controls="ui-stock">
                    <i class="mdi mdi-warehouse menu-icon"></i>
                    <span class="menu-title">Stock</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-stock">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-stock-report')); ?>">
                                Stock Report</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.stock-transfer')); ?>">
                                Stock Transfer</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.store-list')); ?>">
                                Locations</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#salary" aria-expanded="false"
                    aria-controls="ui-stock">
                    <i class="mdi mdi-account-cash-outline menu-icon"></i>
                    <span class="menu-title">Salary</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="salary">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salary-type')); ?>">
                                Salary Type</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salary-info')); ?>">
                                Salary Information</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salary-details')); ?>">
                                Salary Details</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-expense" aria-expanded="false"
                    aria-controls="ui-expense">
                    <i class="mdi mdi-cash-100 menu-icon"></i>
                    <span class="menu-title">Expense</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-expense">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expense')); ?>">
                                Expenses</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expense_category_list')); ?>">
                                Expenses Category</a>
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-expenses')); ?>">
                                All Expenses</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-return" aria-expanded="false" aria-controls="ui-return">
                <i class="mdi mdi-sync-alert menu-icon"></i>
                <span class="menu-title">Return</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-return">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.create-return')); ?>">Product Return</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.create-service-return')); ?>">Service Return</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-return')); ?>">Return Requests</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.completed-return')); ?>">Completed Return</a>
                    </li>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false"
                    aria-controls="ui-product">
                    <i class="mdi mdi-sitemap menu-icon"></i>
                    <span class="menu-title">Category & Items</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-product">
                    <ul class="nav flex-column sub-menu">
                        
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.productMaterial')); ?>">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.footWareCategory')); ?>">Foot Ware Categories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.types')); ?>">Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.material-types')); ?>">Material Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.colors')); ?>">Colors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.brands')); ?>">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.sizes')); ?>">Sizes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-suppliers')); ?>">Suppliers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-unit')); ?>">All Unit</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-backoffice" aria-expanded="false"
                    aria-controls="ui-backoffice">
                    <i class="mdi mdi-account-group menu-icon"></i>
                    <span class="menu-title">Users</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-backoffice">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-backoffice-user')); ?>">System
                                Users</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false"
                    aria-controls="ui-settings">
                    <i class="mdi mdi-tools menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.system-settings')); ?>">System
                                Settings</a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>
        <?php if($user_data->role_id == 3): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('backoffice.sales-form')); ?>">
                    <i class="mdi mdi-cart-arrow-down menu-icon"></i>
                    <span class="menu-title">Invoice</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                    aria-controls="ui-sales">
                    <i class="mdi mdi-file-chart menu-icon"></i>
                    <span class="menu-title">Reports</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-sales">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.suspended_orders')); ?>">
                                Ordered Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.daily_sales_report')); ?>">
                                Daily Sales Report
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>
        <?php if($user_data->role_id == 4): ?>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                aria-controls="ui-sales">
                <i class="mdi mdi-home-export-outline menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-sales">
                <ul class="nav flex-column sub-menu">
                    
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.daily_sales_report')); ?>">
                            Daily Sales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all_sales_report')); ?>">
                            All Sales
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-purchase" aria-expanded="false"
                aria-controls="ui-purchase">
                <i class="mdi mdi-home-import-outline menu-icon"></i>
                <span class="menu-title">Purchase</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-purchase">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(asset('backoffice/purchase/daily-purchase-report')); ?>">
                            Daily Purchase
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(asset('backoffice/purchase/all-purchase-report')); ?>">
                            All Purchase
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-expense" aria-expanded="false"
                aria-controls="ui-expense">
                <i class="mdi mdi-cash-100 menu-icon"></i>
                <span class="menu-title">Expense</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-expense">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-expenses')); ?>">
                            All Expenses</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false"
                aria-controls="ui-reports">
                <i class="mdi mdi-file-chart menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-reports">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salesReport')); ?>">
                        Sales Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.purchaseReport')); ?>">
                        Purchase Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expenseReport')); ?>">
                        Expense Report</a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <?php endif; ?>
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <ul class="mt-4 pl-0">
                        <a href="<?php echo e(route('backoffice.logout')); ?>">Sign Out</a>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function unsync_data_count() {
    $.ajax({
        url: "<?php echo e(route('backoffice.logCount')); ?>",
        method: 'GET',
        success: function (response) {
            $('#unsync-data-count').text(response.logCount);
        },
        error: function () {
            console.log('Error fetching unsync data count.');
        }
    });
}

function autoSync() {
    $.ajax({
        url: "<?php echo e(route('backoffice.sync_data')); ?>",
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        success: function (response) {
            console.log('Auto sync success:', response);
            localStorage.setItem('lastSyncTime', Date.now()); // Save the new sync time
            unsync_data_count();
        },
        error: function () {
            $('#sync-status')
                .removeClass('d-none alert-success')
                .addClass('alert-danger')
                .text('Auto sync failed. Please try again.');
        }
    });
}

$(document).ready(function () {
    unsync_data_count(); // Initial count fetch

    const syncInterval = 1800000; // 30 minutes in milliseconds
    const lastSyncTime = localStorage.getItem('lastSyncTime');

    if (lastSyncTime) {
        const timePassed = Date.now() - parseInt(lastSyncTime);
        if (timePassed >= syncInterval) {
            // 30 minutes already passed ➔ sync immediately
            autoSync();
        } else {
            // Less than 30 minutes ➔ wait for the remaining time
            setTimeout(function () {
                autoSync();
                // After that, sync every 30 minutes
                setInterval(autoSync, syncInterval);
            }, syncInterval - timePassed);
        }
    } else {
        // No sync history ➔ sync immediately
        autoSync();
        setInterval(autoSync, syncInterval);
    }
});
</script>
<?php /**PATH D:\laragon\www\shoepossie-ofline\resources\views/dashboard/pertials/sideNav.blade.php ENDPATH**/ ?>