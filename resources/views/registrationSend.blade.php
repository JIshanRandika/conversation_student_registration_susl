<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocation Registration Pending</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #EB5B00;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Convocation Registration Pending</h2>
        </div>
        <div class="content">
            <p><strong>Your Registration Status: <span style="color: #EB5B00;">{{$status}}</span></strong></p>
            <p>Thank you for submitting your registration for the <strong>General Convocation</strong> of <strong>Sabaragamuwa University of Sri Lanka</strong>.</p>
            <p>Please wait for confirmation from the registration office. You will be notified once the process is completed.</p>
            <p>If you have any questions, feel free to contact the convocation office.</p>
        </div>
        <div class="footer">
            &copy; 2025 Sabaragamuwa University of Sri Lanka | All rights reserved.
        </div>
    </div>
</body>
</html>
