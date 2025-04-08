<!DOCTYPE html>
<html>
<head>
    <title>Login Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding: 10px 0;
        }
        .email-header img {
            max-width: 150px;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }
        .email-body h2 {
            color: #333333;
        }
        .email-body p {
            margin: 15px 0;
        }
        .email-body a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            color: #888888;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="email-container">
    <div class="email-header">
        <img src="<?php echo e(url('/images/gifts/logo.png')); ?>" alt="Forever Medspa">
    </div>
    <p>Dear <?php echo e($patient_full_name); ?>,</p>
    <p>You have successfully logged into your account.</p>

    <p><strong>Login Details:</strong></p>
    <ul>
        <li><strong>IP Address:</strong> <?php echo e($ipAddress); ?></li>
        <li><strong>Browser:</strong> <?php echo e($browser); ?></li>
        <li><strong>Operating System:</strong> <?php echo e($os); ?></li>
        <li><strong>Time:</strong> <?php echo e($loginTime); ?></li>
    </ul>

    <p>If this was you, no action is required. If not, please secure your account immediately.</p>

    <p>Best Regards,<br>
    <strong><?php echo e(config('app.name')); ?></strong></p>
    <div class="email-footer">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.</p>
    </div>
    </div>
</body>
</html>
<?php /**PATH /home/u929332160/domains/myforevermedspa.com/public_html/resources/views/email/login_notification.blade.php ENDPATH**/ ?>