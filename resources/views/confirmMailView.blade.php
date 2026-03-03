{{--Confirm {{$name}}--}}

{{--<form action="{{ route('eligibleStudents.update',2) }}" method="POST">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}
{{--    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

{{--    <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--        <button type="submit" class="btn btn-primary">Update</button>--}}
{{--    </div>--}}


{{--</form>--}}

{{--<a class="nav-link" href="{{ route('eligibleStudents.update',2) }}" >Verify</a>--}}
{{--<a class="nav-link" href="{{ url('/completeEmailVerify',) }}" >Click here to verify</a>--}}

{{-- Successfully registered to the Sabaragamuwa University of Sri Lanka Convocation System --}}




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
            background-color: #007bff;
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
            <h2>Account Created Successfully</h2>
        </div>
        <div class="content">
            <p>Dear Graduate,</p>
            <p>Congratulations! Your account has been successfully created for the <strong>Sabaragamuwa University of Sri Lanka Convocation</strong>.</p>
            <p>Please proceed to complete your registration process.</p>
            <p>For any inquiries, please contact our convocation office.</p>
            <p>Best regards,</p>
            <p><strong>Convocation Committee</strong></p>
        </div>
        <div class="footer">
            &copy; 2025 Sabaragamuwa University of Sri Lanka | All rights reserved.
        </div>
    </div>
</body>
</html>




