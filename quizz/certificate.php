<?php
include_once './config.php';
$id = $_GET['download'];
$user = "SELECT user,phone,marks FROM completed WHERE uids='$id' ";
$rs = mysqli_query($con, $user);
$data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
$count = mysqli_num_rows($rs);
//user details
$username = strtoupper($data['user']);
$phone = $data['phone'];
$marks;
if ($count == 1) {

    //certificate
    $sid = $phone;
    $today = date('Y-M-d');
    $file = $sid;
    $font = dirname(__FILE__) . '/cambriab.ttf';
    $image = imagecreatefrompng("img/certificate.png");
    $h = imagesx($image);
    $color = imagecolorallocate($image, 0, 0, 128);
    $dcolor =  imagecolorallocate($image, 255, 0, 0);

    //user name
    imagettftext($image, 65, 0, 380, 1000, $color, $font,  $username);
    //verification id 
    imagettftext($image, 33, 0, 750, 1366, $color, $font, $sid);
    imagepng($image, "../quizz/certified/" . $file . ".png");
    imagedestroy($image);
} else {
    echo "
    <script>
    alert('something went wrong sorry!');
    </script>
    ";
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
    <title>certificate download</title>
</head>

<body>
    <div class="container">
        <center>

            <a href="./download.php?ids=<?php echo $sid ?> " type="button" class="btn btn-primary mt-5"><i class="fa fa-download"></i> Download Certificate</a>

        </center>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>