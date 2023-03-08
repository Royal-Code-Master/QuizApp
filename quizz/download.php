<?php
require '../cs/config.php';

if (isset($_GET['ids'])) {
    $filename = basename($_GET['ids']);
    $filePath = "certified/" . $filename . ".png";

    if (file_exists($filePath)) {
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename.png");
        header("Content-Type: image");
        header("Content-Transfer-Encoding: binary");

        //read file 
        readfile($filePath);
        exit;
    } else {
        echo "<script>alert('The file is not exist in the server! But The File Infomation is available please upload first')</script>";
    }
}
