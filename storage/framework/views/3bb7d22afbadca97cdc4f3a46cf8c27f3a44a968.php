<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #code {
            display: none
        }

        .barcode {
            width: 350px;
            height: 30px;
        }

        /* @media print {


        } */
    </style>

</head>

<body>
    

    <?php
        use App\Models\BannerInformation;
        $d = new \Milon\Barcode\DNS1D();


        $barcodeValue = $getPurchaseBarcode->barcode; // You can change this value as needed
    $barcodeHTML = $d->getBarcodeSVG($barcodeValue, 'C128', 1.2, 40);
    ?>
    <div>
        


        <div style="text-align: center;" style="font-size: 14px;">
            
            <span style="font-weight: bold;font-size:28px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">J & B ENTERPRISE</span><br />
            

            <p style="text-align:center; font-weight: bold;font-size:18px; letter-spacing:.15rm; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:0"><?php echo e($getPurchaseBarcode->barcode); ?></p><br />

            

            

            <div class="barcode-image" style="display: flex; align-items:center; justify-content:center;margin:0;padding-left:2px">
                
                
                <div class="barcode">
                    <?php echo $barcodeHTML; ?>

                </div>
            </div>

            <p style="text-align:center; font-weight: bold; font-size: 18px; margin:0; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Price: <?php echo e($getPurchaseBarcode->sales_price); ?></p>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\shoepossie-ofline\resources\views/dashboard/purchaseNew/dailyPurchaseBarcode.blade.php ENDPATH**/ ?>