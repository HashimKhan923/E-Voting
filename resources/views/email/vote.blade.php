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

        <p>We trust this message finds you well. We wish to extend our sincere gratitude for your active involvement in the recent poll where users expressed their preferences for their favorite Prime Minister</p>

<p>Your commitment to this democratic process is deeply valued, as it plays a pivotal role in influencing the trajectory of our nation. We firmly believe that every voice holds significance, and your vote contributes to fostering a diverse and inclusive representation of opinions. Your ballot number is <b>{{ $ballot_number }}</b></p>

<p>In line with our dedication to transparency and accountability, we want to inform you that each participant has been assigned a unique ballot number for identification purposes. We assure you that your information will be kept confidential and will not be shared with any third party. It will remain secure within our system and may be utilized in the future to relay notifications and updates regarding the poll results or other community-related matters</p>

<p>As we gather and meticulously analyze the results, we eagerly anticipate sharing the outcomes with you and the entire community. Your input will undoubtedly aid us in gaining a deeper understanding of the collective preferences and perspectives within our user base.</p>

<p>Once again, thank you for taking the time to cast your vote. Your engagement is instrumental to the success and growth of our nation.</p>



        <p>Best regards ,</p>
        <p>Overseas Pakistani Team</p>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
