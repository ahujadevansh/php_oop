<?php

require_once("app/init.php");

if(!empty($_POST)) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $validator = new Validator($database, $errorHandler);
    $validation = $validator->check($_POST, [
        'email' => [
            'required' => true,
            'maxlength' => 255,
            'unique' => 'users',
            'email' => true
        ],
        'username' => [
            'required' => true,
            'minlength' => 2,
            'maxlength' => 20,
            'unique' => 'users',
        ],
        'password' => [
            'required' => true,
            'minlength' => 8,
        ]
    ]);

    if($validation->fails()) {
        // display the errors
        // echo "<pre>".print_r($validation->errors()->all()), "</pre>";
    }
    else {
        // create the user
        $created = $auth->create([
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);

        if($created) {
            header("Location: index.php");
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container">
      <form action="signup.php" method="POST" class="m-2">
        <fieldset>
            <legend>Sign UP</legend>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                    <div class="email_error bg-warning">
<?php
    if($validation->errors()->has('email')):
        $errors = $validation->errors()->all('email'); 
        foreach($errors as $error):
            echo "<p> {$error} </>";
        endforeach;
    endif;
?>
                    </div>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
                <div class="username_error bg-warning">
<?php
    if($validation->errors()->has('username')):
        $errors = $validation->errors()->all('username'); 
        foreach($errors as $error):
            echo "<p> {$error} </>";
        endforeach;
    endif;
?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <div class="password_error bg-warning">
<?php
    if($validation->errors()->has('email')):
        $errors = $validation->errors()->all('password'); 
        foreach($errors as $error):
            echo "<p> {$error} </>";
        endforeach;
    endif;
?>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary float-right" value="Sign Up">
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