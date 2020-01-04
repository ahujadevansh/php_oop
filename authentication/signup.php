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
        echo "<pre>".print_r($validation->errors()->all()), "</pre>";
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
  <body>
      <form action="signup.php" method="POST">
        <fieldset>
            <legend>Sign UP</legend>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <?php if($validation->errors()->has('email')): ?>

                    <div class="danger">
                        <?= $validation->errors()->first('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <input type="submit" value="Sign Up">
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