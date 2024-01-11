<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Voting</title>

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
            margin: 20px ;
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


    </style>
</head>
<body>

    <div class="container">
        <!-- <img src="path/to/your/company-logo.png" alt="Company Logo"> -->
        <h1>Thank You for Voting!</h1>

        <b>Dear {{$name}},</b>

        <p>I hope this email finds you well. We wanted to take a moment to express our heartfelt gratitude for your active participation in the recent poll where users voted for their favorite Prime Minister.</p>

<p>Your engagement in this democratic process is highly appreciated, and it plays a crucial role in shaping the direction of our community. We believe that everyone's voice matters, and your vote contributes to a diverse and inclusive representation of opinions.</p>

<p>As a token of our commitment to transparency and accountability, we want to inform you that each participant has been assigned a unique ballot number for identification purposes. Your ballot number is <h2 class="otp-box">{{ $ballot_number }}</h2>.</p>

<p>We want to assure you that your ballot number will not be shared with any third party, and it will remain secure within our system. Additionally, it may be used in the future to send notifications and updates related to the poll results or other community-related matters.</p>

<p>The enthusiasm and commitment shown by individuals like yourself are what make our community vibrant and dynamic. We value your dedication to participating in activities that strengthen the democratic fabric of our society.</p>

<p>As we gather and analyze the results, we look forward to sharing the outcome with you and the entire community. Your input will undoubtedly help us better understand the collective preferences and perspectives within our user base.</p>

<p>Once again, thank you for taking the time to cast your vote. Your engagement is vital to the success and growth of our community.</p>


        <p>Best regards ,</p>
        <p>Overseas Pakistani Team</p>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
