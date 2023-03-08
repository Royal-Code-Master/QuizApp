<?php

include '../quizz/config.php';

session_start();

if (isset($_POST['login'])) {

    $uname = $_POST['lname'];
    $upwd = $_POST['lpwd'];

    $uname = stripcslashes($uname);
    $upwd = stripcslashes($upwd);

    $uname  = mysqli_real_escape_string($con, $uname);
    $upwd = mysqli_real_escape_string($con, $upwd);

    //encrypt.
    $upwd = sha1($upwd);


    //login selection.
    $data_select = "SELECT passwords,mail from student where passwords='$upwd' ";
    $data_result = mysqli_query($con, $data_select);
    $data = mysqli_fetch_array($data_result, MYSQLI_ASSOC);


    if ($uname == $data['mail'] && $upwd == $data['passwords']) {
        header("location: questions.php?verify=" . $data['passwords']);
    } else {
        header("location: login.php?login-status=user-login-failed");
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Faster+One&family=Goblin+One&family=Meie+Script&family=Rye&family=Sail&family=Sirin+Stencil&display=swap');

    nav {
        border-bottom: 3px solid lime !important;
    }

    .navbar-brand {
        font-family: 'Faster One', cursive;
        font-weight: 10;
        text-align: center;
        width: 60px;
        height: 60px;
        margin-left: 1rem;
        padding: 5px;
        color: lime !important;
        font-size: 27px;
        border: 4px solid lime;
        border-radius: 50%;
    }

    form {
        background-color: rgba(0, 0, 0, 0.941) !important;
        height: auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgb(239, 236, 236);
        border: 2px solid lime !important;
        border-radius: 20px !important;
    }

    label {
        color: lime;
        text-align: left !important;
        font-weight: bold;
        font-family: Cambria;
    }

    input {
        background-color: rgba(0, 0, 0, 0.941) !important;
        color: lime !important;
    }

    .row {
        background-color: rgba(0, 0, 0, 0.941);
    }

    #login {
        background-color: lime !important;
        color: black !important;
        padding: 5px;
        font-weight: bold;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        border-radius: 25px;
    }

    #logup {
        color: lime !important;
        border: 2px solid lime;
        margin-top: 1rem;
        padding: 5px;
        font-weight: bold;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        border-radius: 25px;
        margin-bottom: 1rem;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ER</a>
        </div>
        </div>
    </nav>

    <div id="loginsection" class=" bg-dark" style="height: 90vh;">
        <br><br><br><br>
        <div class="container">
            <center>
                <form action="" method="post" class="form-control">
                    <br>
                    <i class="fa fa-user-circle-o fa-3x mb-4" style="color:lime ;"></i>
                    <br>

                    <div class="row form-control">
                        <label for=""> <i class="fa fa-user"></i> email</label>
                        <input type="email" name="lname" id="" class="form-control" required>
                    </div>
                    <br>

                    <div class="row form-control">
                        <label for=""> <i class="fa fa-key"></i> password</label>
                        <input type="password" name="lpwd" id="" class="form-control" required>
                    </div>
                    <br>

                    <button class="form-control btn" type="submit" name="login" id="login">Sign in</button>

                    <a href="../quizz/signup.php" class="form-control btn" type="submit" name="login" id="logup">Sign
                        up</a>
                </form>
            </center>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>