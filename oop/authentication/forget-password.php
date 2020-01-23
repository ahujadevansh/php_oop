<?php

require_once "app/init.php";

if(!empty($_POST)) {

    $email = $_POST['email'];
    $user = $userHelper->getUserByEmail($email);
    if($user) {
        $token = $tokenHandler->createForgetPasswordToken($user->id);

        if($token) {
            $mail->addAddress($user->email);
            $mail->Subject = "Reset Password!";
            $mail->Body = "USE the below link within 15 minutes to reset your password.<br> <a href='http://localhost:8080/reset-password.php?token={$token}&email={$email}'>RESET PASSWORD</a>";
            if($mail->send()) {
                echo "Password Reset Link has been sent!";
            }
            else {
                echo $mail->ErrorInfo;
            }
        }
    }

}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container">
      
<form class="m-2" action="forget-password.php" method="POST">
    
    <fieldset>
        <legend>Forget Password</legend>
        <div class="form-group">
            <label for="password">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary float-right" value="Forget Password">
        </div>
    </fieldset>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>