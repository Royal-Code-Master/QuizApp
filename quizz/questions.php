<?php
include "../quizz/config.php";


$ids = $_GET['verify'];
$selecting = "SELECT user,passwords,phone FROM student WHERE passwords='$ids'";
$results = mysqli_query($con, $selecting);
$get_data = mysqli_fetch_array($results);

$name = $get_data['user'];
$phone = $get_data['phone'];
$uids = $get_data['passwords'];


if (isset($_POST['completed'])) {
    $count = 0;

    if (empty($_POST['q1']) || empty($_POST['q2']) || empty($_POST['q3']) || empty($_POST['q4']) || empty($_POST['q5']) || empty($_POST['q6']) || empty($_POST['q7']) || empty($_POST['q8']) || empty($_POST['q9']) || empty($_POST['q10'])) {
        echo "<script>alert('answer all the questions')</script>";
    } else {
        if ($_POST['q1'] == 'D') {
            $count++;
        }
        if ($_POST['q2'] == 'A') {
            $count++;
        }

        if ($_POST['q3'] == 'D') {
            $count++;
        }

        if ($_POST['q4'] == 'B') {
            $count++;
        }

        if ($_POST['q5'] == 'B') {
            $count++;
        }

        if ($_POST['q6'] == 'D') {
            $count++;
        }


        if ($_POST['q7'] == 'C') {
            $count++;
        }

        if ($_POST['q8'] == 'A') {
            $count++;
        }

        if ($_POST['q9'] == 'C') {
            $count++;
        }

        if ($_POST['q10'] == 'B') {
            $count++;
        }

        $count = $count * 10;

        //insert.
        $s = "SELECT user,phone,statuss,uids FROM completed WHERE phone='$phone'";
        $result = mysqli_query($con, $s);
        $gets_data = mysqli_fetch_array($result);

        if ($gets_data['user'] == $name || $gets_data['phone'] == $phone || $gets_data['statuss'] == '1') {
            header("location:result.php?v=" . $gets_data['uids']);
        } else {
            $inserting = "INSERT INTO completed (user,phone,marks,uids,statuss) VALUES ('$name','$phone','$count','$uids','1')";
            $r = mysqli_query($con, $inserting);
            if ($r) {
                header("location:result.php?v=" . $ids);
            } else {
                echo "<script>alert('Not Submitted Something went wrong.')</script>";
            }
        }
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

    label {
        color: lime;
        font-weight: bolder;
        font-size: 20px;
        font-family: 'Times New Roman', Times, serif;
    }

    ul {
        list-style: none;
    }

    ul li {
        color: lime;
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
    }

    #sentans {
        background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%);
        text-align: center;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 9px rgb(208, 206, 206);
        border-radius: 20px;
        display: block;
        font-weight: bold;
        font-size: 19px;
        width: auto;
    }
</style>



<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ER</a>
        </div>
        </div>
    </nav>

    <div class="que bg-dark">
        <div class="container">
            <br><br>
            <center style="color:whitesmoke; font-weight:bold; font-size:25px; ">Full Stack Web Developement Quizz
            </center>
            <br>


            <form action="" method="post" class="form-control bg-dark">

                <div class="row form-control bg-dark m-2">
                    <label for="">1. How many header tags in HTML?</label>
                    <div>
                        <ul>
                            <li><input type="radio" name="q1" id="q1" value="A" require> A) 2</li>
                            <li><input type="radio" name="q1" id="q1" value="B" require> B) 4</li>
                            <li><input type="radio" name="q1" id="q1" value="C" require> C) 3</li>
                            <li><input type="radio" name="q1" id="q1" value="D" require> D) 6</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">2. Use of HTML?</label>
                    <div>
                        <ul>
                            <li><input type="radio" name="q2" id="q2" value="A" require> A) To display content</li>
                            <li><input type="radio" name="q2" id="q2" value="C" require> C) To display styles</li>
                            <li><input type="radio" name="q2" id="q2" value="B" require> B) To display text</li>
                            <li><input type="radio" name="q2" id="q2" value="D" require> D) To display images</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">3. Which of the following CSS framework is used to create a responsive design?</label>
                    <div>
                        <ul>
                            <li><input type="radio" name="q3" id="q3" value="A" require> A) django</li>
                            <li><input type="radio" name="q3" id="q3" value="B" require> B) rails</li>
                            <li><input type="radio" name="q3" id="q3" value="C" require> C) larawell</li>
                            <li><input type="radio" name="q3" id="q3" value="D" require> D) bootstrap</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">4. Which of the following is not the property of the CSS box model?</label>
                    <div>
                        <ul>
                            <li><input type="radio" name="q" id="q4" value="A" require> A) margin</li>
                            <li><input type="radio" name="q4" id="q4" value="B" require> B) color</li>
                            <li><input type="radio" name="q4" id="q4" value="C" require> C) width</li>
                            <li><input type="radio" name="q4" id="q" value="D" require> D) height</li>
                        </ul>
                    </div>
                </div>

                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">5. Choose the correct JavaScript syntax to change the content of the following HTML code.</label>
                    <ul>
                        <li><input type="radio" name="q5" id="q5" value="A" require> A) document.getElement ("letsfindcourse").innerHTML = "I am a letsfindcourse";</li>
                        <li><input type="radio" name="q5" id="q5" value="B" require> B) document.getElementById ("letsfindcourse").innerHTML = "I am a letsfindcourse";</li>
                        <li><input type="radio" name="q5" id="q5" value="C" require> C) document.getId ("letsfindcourse") = "I am a letsfindcourse";</li>
                        <li><input type="radio" name="q5" id="q5" value="D" require> D) document.getElementById ("letsfindcourse").innerHTML = I am a letsfindcourse;</li>
                    </ul>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">6. What are the types of Pop up boxes available in JavaScript?</label>
                    <ul>
                        <li><input type="radio" name="q6" id="q6" value="A" require> A) Alert</li>
                        <li><input type="radio" name="q6" id="q6" value="B" require> B) Prompt</li>
                        <li><input type="radio" name="q6" id="q6" value="C" require> C) Confirm</li>
                        <li><input type="radio" name="q6" id="q6" value="D" require> D) All</li>
                    </ul>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">7. SHA1 value for require "ADMIN"</label>
                    <ul>
                        <li><input type="radio" name="q7" id="q7" value="A" require> A) d033e22ae348aeb5660fc2140aec35850c4da997</li>
                        <li><input type="radio" name="q7" id="q7" value="B" require> B) 4e7afebcfbae000b22c7c85e5560f89a2a0280b4</li>
                        <li><input type="radio" name="q7" id="q7" value="C" require> C) b521caa6e1db82e5a01c924a419870cb72b81635</li>
                        <li><input type="radio" name="q7" id="q7" value="D" require> D) 68ea58d47d701c4592e9e642b51f325581a1f684</li>
                    </ul>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">8. What does SPL stands for</label>
                    <ul>
                        <li><input type="radio" name="q8" id="q8" value="A" require> A) Standard PHP Library</li>
                        <li><input type="radio" name="q8" id="q8" value="B" require> B) Simple PHP Library</li>
                        <li><input type="radio" name="q8" id="q8" value="C" require> C) Simple PHP List</li>
                        <li><input type="radio" name="q8" id="q8" value="D" require> D) None of the above</li>
                    </ul>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">9. Which one of the following statements can be used to select the database? </label>
                    <ul>
                        <li><input type="radio" name="q9" id="q9" value="A" require> A) $mysqli=select_db(‘databasename’);</li>
                        <li><input type="radio" name="q9" id="q9" value="B" require> B) mysqli=select_db(‘databasename’);</li>
                        <li><input type="radio" name="q9" id="q9" value="C" require> C) $mysqli->select_db(‘databasename’);</li>
                        <li><input type="radio" name="q9" id="q9" value="D" require> D) mysqli->select_db(‘databasename’);</li>
                    </ul>
                </div>
                <br>
                <div class="row form-control bg-dark m-2">
                    <label for="">10. Which method retrieves each row from the prepared statement result and assigns the fields to the bound results?</label>
                    <ul>
                        <li><input type="radio" name="q10" id="q10" value="A" require> A) get_row()</li>
                        <li><input type="radio" name="q10" id="q10" value="B" require> B) fetch()</li>
                        <li><input type="radio" name="q10" id="q10" value="C" require> C) fetched()</li>
                        <li><input type="radio" name="q10" id="q10" value="D" require> D) fetchs()</li>
                    </ul>
                </div>
                <br>
                <center>
                    <button type="submit" class="form-control btn" name="completed" id="sentans"> Submit Result
                    </button>
                </center>
                <br>
            </form>
            <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>