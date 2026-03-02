{{-- @php
    $currentYear = date("Y");
@endphp

@if($status=='Accept')
    <strong><span style="font-size: larger; color: green;">Congratulations!</span></strong>

    <br><br>

    You have successfully registered to the {{ $currentYear }} General Convocation of Sabaragamuwa University of Sri Lanka.

    <br><br>

    <span style="color: red;">According to the UGC guidelines, you are required to fill the following form to confirm your graduation.</span>

    <br><br>

    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeOrqzF3SfVH8kD_RfW7IMitq4lKq4s4ttiVxBR71rTzbh2xQ/viewform?usp=sf_link">
        <button style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Click Here to Fill Out the Form to Confirm Your Graduation
        </button>
    </a>@endif

@if($status=='Reject')
    <strong><span style="font-size: larger; color: red;">Sorry your registration was rejected. Please log in to the convocation registration system, reason will be there. Edit your details and update it.</span></strong>
@endif

@if($status=='Pending')
    <strong><span style="font-size: larger; color: green;">Again your registration is in pending stage.</span></strong>
@endif --}}




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocation Registration Confirmation</title>
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
            background-color: #28a745;
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
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Convocation Registration Confirmation</h2>
        </div>
        <div class="content">
            <?php $currentYear = date("Y"); ?>
            
            <?php if($status == 'Accept'): ?>
                <p><strong><span style="font-size: larger; color: green;">Congratulations!</span></strong></p>
                <p>You have successfully registered for the <strong><?php echo $currentYear; ?> General Convocation</strong> of <strong>Sabaragamuwa University of Sri Lanka</strong>.</p>
                <p><span style="color: red;">According to the UGC guidelines, you are required to fill out the following form to confirm your graduation.</span></p>
                <a style="color: #ffffff"  href="https://docs.google.com/forms/d/e/1FAIpQLSeOrqzF3SfVH8kD_RfW7IMitq4lKq4s4ttiVxBR71rTzbh2xQ/viewform?usp=sf_link" class="btn-primary">
                    Click Here to Fill Out the Form
                </a>
            <?php elseif($status == 'Reject'): ?>
                <p><strong><span style="font-size: larger; color: red;">Sorry, your registration was rejected.</span></strong></p>
                <p>Please log in to the convocation registration system to view the reason. Edit your details and update them.</p>
            <?php elseif($status == 'Pending'): ?>
                <p><strong><span style="font-size: larger; color: green;">Your registration is still pending.</span></strong></p>
                <p>Please wait for confirmation from the registration office.</p>
            <?php endif; ?>
        </div>
        <div class="footer">
            &copy; 2025 Sabaragamuwa University of Sri Lanka | All rights reserved.
        </div>
    </div>
</body>
</html>
