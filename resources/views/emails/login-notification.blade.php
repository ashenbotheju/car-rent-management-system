<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #1e40af;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-height: 80px;
        }

        .content {
            padding: 30px;
            color: #333;
        }

        .content h2 {
            color: #1e40af;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        a {
            color: #1e40af;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/VLogo.png') }}" alt="Venujaya Car Rent Management System Logo">
        </div>
        <div class="content">
            <h2>Welcome, {{ $userName }}!</h2>
            <p>We’re pleased to inform you that you have successfully logged into your account at <strong>Venujaya Car
                    Rent
                    Management System</strong> on {{ $loginTime }}.</p>
            <p>If this was not you, please secure your account immediately by changing your password or contacting
                support at <a href="mailto:contact@carrent.com">contact@carrent.com</a>.</p>
            <p>Happy renting!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Car Rent Management System. All rights reserved.</p>
            <p><a href="{{ url('/') }}">Visit our website</a></p>
        </div>
    </div>
</body>

</html>
