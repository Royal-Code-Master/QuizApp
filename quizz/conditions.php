<?php
include "../quizz/config.php";

$ids = $_GET['verify'];
$selecting = "SELECT user FROM student WHERE passwords='$ids'";
$results = mysqli_query($con, $selecting);
$get_data = mysqli_fetch_array($results);

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

    label {
        font-size: 30px;
        color: red;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    ul li {
        color: whitesmoke;
        font-size: 18px;
        font-family: 'Times New Roman', Times, serif;
        margin-left: 1rem !important;
        margin-top: 10px;
    }

    #starting {



        background-image: linear-gradient(to right, #ff0084 0%, #33001b 51%, #ff0084 100%);
        text-align: center;
        text-transform: capitalize;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 10px #eee;
        border-radius: 10px;
        display: block;
        width: auto;
        font-size: 22px;
        margin-top: 1rem;
    }
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ER</a>
        </div>
        </div>
    </nav>

    <div class="terms bg-dark" style="height: 90vh;">
        <br><br><br>
        <center style="color: white;  font-size:22px;">Welcome : <?php echo $get_data['user']; ?> </center>

        <div class="container">
            <br><br>
            <div class="row">
                <label for="">Terms And Conditions.</label>
                <br>
                <br>
                <br>
                <ul>
                    <li>This Quizz is conducting on full stack web developement.</li>
                    <li>In This Quizz we given 20 questions</li>
                    <li>And each right answer have 4 marks </li>
                    <li>If You get 75% marks in this Quizz we will provide certificate to you only.</li>
                </ul>
            </div>
        </div>

        <br><br>
        <center>
            <button type="submit" class="form-control btn" id="starting" name="quizz" onclick="starting();">Get Start
                Now</button>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function starting() {
            location.href = "questions.php";
        }
    </script>
</body>

</html>