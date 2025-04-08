

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <style>
        /* Page and font styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header styling */
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding: 20px 0;
        }
        .header img {
            max-width: 150px;
        }
        .header h1 {
            margin: 10px 0 5px;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        /* Content styling */
        .content {
            padding: 20px 0;
        }
        .content h2 {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }
        .content p {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        /* Footer styling */
        .footer {
            border-top: 1px solid #333;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666;
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Letterhead Header -->
        <div class="header">
            <div>
            <img src="<?php echo e(url('/logo.png')); ?>" alt="Forever Mdespa">
            </div>
            <h1><?php echo e($company); ?></h1>
            <p><?php echo e($address_1); ?></p>
            <p><?php echo e($address_2); ?></p>
            <p>Email: <?php echo e($email); ?> | Phone: <?php echo e($phone); ?></p>
        </div>

        <!-- Content Section -->
        <div class="content">
        <div style="text-align: right;">Date:.<?php echo e($date); ?></div>
            <?php echo $terms; ?>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; <?php echo e($company); ?>. All rights reserved.</p>
            <p>For more information, visit https://forevermedspanj.com/ or contact us at <?php echo e($phone); ?>.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/terms_and_condition/terms.blade.php ENDPATH**/ ?>