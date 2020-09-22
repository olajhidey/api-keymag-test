<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
    
    .container,.container-fluid,.container-lg,.container-md,.container-sm,.container-xl{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:576px){.container,.container-sm{max-width:540px}}@media (min-width:768px){.container,.container-md,.container-sm{max-width:720px}}@media (min-width:992px){.container,.container-lg,.container-md,.container-sm{max-width:960px}}@media (min-width:1200px){.container,.container-lg,.container-md,.container-sm,.container-xl{max-width:1140px}}
    </style>
    <style>
            body {
                font-family: 'Nunito';
            }
        </style>
</head>
<body class="antialiased">

            <div class="container" style="max-width:600px; height: 500px;">
                <div style="height:10px; background-color:#007bff;"></div>

                <h3 class="mt-4">Welcome {{ $user->name }},</h3>
                <p>Hi {{ $user->name}},</p>
                <p>Welcome to your new KeyMag account, Thank you for registering on <b>KeyMag</b>! Kindly click on the link below to verify your email address.</p>
                <p>The below link expires in 2 minutes</p>
                <a href="{{ $link }}" style="width: 100px; height: 100px; background: #007bff; padding: 7px; border-radius: 50px; text-decoration:none; color: #fff;">Verify Account</a>
                
                <br><br>
                <p>Regards</p>
                <p>KeyMag Team</p>
                
            </div>
    
</body>
</html>