<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Ledger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .customer-info, .transaction-details {
            margin-bottom: 20px;
        }
        .customer-info p, .transaction-details p {
            margin: 0;
        }
        .text-center {
            text-align: center;
        }
        .text-end {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        tfoot td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="customer-info">
            <div>
                <p><strong>Mobile No.:</strong> <?php echo e($consumer->mobile_no); ?></p>
            </div>
        </div>
        <div class="transaction-details text-center">
            <h3>Transaction Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Payable</th>
                        <th>Paid</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $totalPayable = 0;
                        $totalPaid = 0;
                        $totalBalance = 0;
                    ?>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($payment->created_at); ?></td>
                            <td><?php echo e($payment->customer_payment_id); ?></td>
                            <td class="text-end"><?php echo e($payment->payable_amount); ?></td>
                            <td class="text-end"><?php echo e($payment->paid_amount); ?></td>
                            <td class="text-end">
                                <?php if($payment->revised_due): ?>
                                    <?php echo e($payment->revised_due); ?>

                                    <?php $totalBalance += $payment->revised_due; ?>
                                <?php else: ?>
                                    0
                                <?php endif; ?>
                            </td>
                            <?php
                                $totalPayable += $payment->payable_amount;
                                $totalPaid += $payment->paid_amount;
                            ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td class="text-end"><?php echo e($totalPayable); ?></td>
                        <td class="text-end"><?php echo e($totalPaid); ?></td>
                        <td class="text-end"><?php echo e($totalBalance); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\shoepossie-ofline\resources\views/possie/reports/printCustomerLedger.blade.php ENDPATH**/ ?>