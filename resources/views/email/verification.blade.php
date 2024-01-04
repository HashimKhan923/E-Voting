<!DOCTYPE html>
<html>
<head>
  <title>Email Verification</title>
  <!-- Add Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container" style="min-width:1000px; overflow:auto; line-height:2">
    <div class="row justify-content-center" style="margin:50px auto; padding:20px 0">
      <div class="col-md-8" style="border-bottom:1px solid #eee">
        <!-- Add your company logo image here -->
        <h1 class="mt-3"><a href="#" style="font-size:1.4em; color: #00466a; text-decoration:none; font-weight:600">Dragon Auto Mart</a></h1>
        <p class="font-size-18">Hi, Mr. {{$name}}</p>

        <p>this is your verification token</p>
        <h5>{{$token}}</h5>
        <p class="font-size-14">Regards,<br />E-Voting</p>
        <hr style="border:none; border-top:1px solid #eee" />
        <div class="text-right text-muted" style="padding:8px 0; font-size:0.8em; font-weight:300">
          <!-- Your company address or other information can be added here -->
        </div>
      </div>
    </div>
  </div>
</body>
</html>