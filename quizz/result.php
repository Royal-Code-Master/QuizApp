<?php
include_once './config.php';

$u_id = $_GET['v'];

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

    table {
        max-width: 600px;
    }

    th {
        color: lime;
        font-size: 20px;
        font-weight: bolder;
        font-style: oblique;

    }
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ER</a>
        </div>
        </div>
    </nav>

    <div class="result bg-dark" style="height:90vh;">
        <br><br><br>
        <center>
            <p style="color:lime; font-size:20px; font-weight:bold; font-family:'Times New Roman', Times, serif;">Your Result</p>
        </center>
        <br>

        <center>
            <table class="table table-dark table-responsive table-bordered">

                <?php
                $getting_success_user = "SELECT user,phone,marks FROM completed WHERE uids = '$u_id' ";
                $getting_success_user_result = mysqli_query($con, $getting_success_user);
                $success = mysqli_fetch_array($getting_success_user_result);
                ?>

                <tr>

                    <th>NAME</th>

                    <td style="text-align: center; font-size:20px;"><?php echo $success['user'] ?></td>
                </tr>
                <tr>

                    <th>PHONE</th>

                    <td style="text-align: center; font-size:20px;"><?php echo $success['phone'] ?></td>
                </tr>
                <tr>

                    <th>MARKS</th>

                    <td style="text-align: center; font-size:20px;"><?php echo $success['marks'] ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <a href="./certificate.php?download=<?php echo $u_id ?>" class="text">Download Your Completion Certificate</a>
                        </center>
                    </td>
                </tr>

            </table>
        </center>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>