<?php

include "../quizz/config.php";

if (isset($_POST['logup'])) {


    $rname = $_POST['rname'];
    $rpwd = $_POST['rpwd'];
    $rmail   = $_POST['rmail'];
    $rphone = $_POST['rphone'];


    //data filtering
    $rname = stripcslashes($rname);
    $rpwd = stripcslashes($rpwd);
    $rmail = stripcslashes($rmail);
    $rphone = stripcslashes($rphone);





    //data clean
    $rname = mysqli_real_escape_string($con, $rname);
    $rpwd = mysqli_real_escape_string($con, $rpwd);
    $rmail = mysqli_real_escape_string($con, $rmail);
    $rphone = mysqli_real_escape_string($con, $rphone);

    $rpwd = sha1($rpwd);

    //data dumping
    $insert_query = "insert into student (user,passwords,mail,phone) values ('$rname','$rpwd','$rmail','$rphone')";
    $insert_result = mysqli_query($con, $insert_query);
    if ($insert_result) {
        echo "<script>alert('registeration successfull !')</script>";
    } else {
        echo "<script>alert('registeration  is failed !')</script>";
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
        height: auto;
        background-color: rgba(0, 0, 0, 0.941) !important;
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
    <div id="loginsection" class=" bg-dark" style="height: auto;">
        <br><br>
        <div class="container">
            <center>
                <form action="" method="post" class="form-control">
                    <br>
                    <i class="fa fa-user-circle-o fa-3x mb-4" style="color:lime ;"></i>
                    <br>
                    <div class="row form-control">
                        <label for=""> <i class="fa fa-user"></i> user name</label>
                        <input type="text" name="rname" id="" class="form-control" required>
                    </div>
                    <br>
                    <div class="row form-control">
                        <label for=""> <i class="fa fa-envelope"></i> email</label>
                        <input type="email" name="rmail" id="" class="form-control" required>
                    </div>
                    <br>

                    <div class="row form-control">
                        <label for=""> <i class="fa fa-key"></i> password</label>
                        <input type="text" name="rpwd" id="" class="form-control" required>
                    </div>
                    <br>
                    <div class="row form-control">
                        <label for=""> <i class="fa fa-phone"></i> phone number</label>
                        <input type="number" name="rphone" id="" class="form-control" required>
                    </div>
                    <br>

                    <button class="form-control btn" type="submit" name="logup" id="login">Sign up</button>

                    <a href="../quizz/login.php" class="form-control btn mt-3 mb-3" type="submit" name="login" id="logup">Sign
                        in</a>
                </form>
            </center>
        </div>
        <br><br>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>