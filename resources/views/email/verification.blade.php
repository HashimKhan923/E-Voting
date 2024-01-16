<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for registration</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .otp-box {
            background: #00466a;
            margin: 0 auto;
            width: max-content;
            padding: 0 10px;
            color: #fff;
            border-radius: 4px;
            font-size: 1.5em;
            text-align: center;
        }

        .copy-button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }


    </style>
</head>
<body>

    <div class="container">
        <!-- <img src="path/to/your/company-logo.png" alt="Company Logo"> -->

        <b>Dear {{$name}},</b>
        <p>Thank you for your Registration.</p>

        <b>Your Verification Token Number: <span class="otp-box" id="verificationToken">{{ $token }}</span></b>

        <h3>Voting Instructions:</h3>

        <ol>
            <li>Begin by registering for an account.</li>
            <li>Upon registration, an OTP will be sent to your designated email address.</li>
            <li>Enter the OTP to verify your identity.</li>
            <li>Sign in using your registered email and password.</li>
            <li>Choose your preferred political party.</li>
            <li>Click the thumb button, triggering a popup where you can select either Yes or No.</li>
            <li>If you choose Yes, your vote will be successfully cast.</li>
            <li>Following the completion of your vote, you will receive a confirmation email.</li>
        </ol>

        <h5>Best Regards.</h5>
        <h5>Overseas Pakistani Team</h5>

    </div>

    <!-- No JavaScript needed for this solution -->

</body>
</html>
