<?php

require_once("app/init.php");

if(!empty($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $validator = new Validator($database, $errorHandler);

    $validation = $validator->check($_POST, [
        'username' => [
            'required' => true
        ],
        'password' => [
            'required' => true
        ]
    ]);

    if($validation->fails()) {
        // display the errors
        echo "<pre>".print_r($validation->errors()->all()), "</pre>";
    }
    else {
        $signin = $auth->signin([
            'username' => $username,
            'password' => $password
        ]);

        if($signin) {
            header("Location: index.php");
        }
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Signin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <form action="signin.php" method="POST">
    
        <fieldset>
            <legend>Sign In</legend>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <input type="submit" value="Sign In">
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