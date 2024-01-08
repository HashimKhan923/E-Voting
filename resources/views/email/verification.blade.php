<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for registration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        /* Add your custom styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 20px auto;
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
            cursor: pointer;
        }

        h1, p {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- <img src="path/to/your/company-logo.png" alt="Company Logo"> -->

        <b>Dear {{$name}},</b>
        <p>Thanks for registration.</p>

        <b>your verification token: <h2 class="otp-box" title="click to copy" id="verificationToken" onclick="copyToClipboard('{{ $token }}')">{{ $token }}</h2></b>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Clipboard.js -->
    <script>
        function copyToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Verification token copied to clipboard!');
        }
    </script>

</body>
</html>