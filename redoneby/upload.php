<?php
//include the database configurationfile
require_once 'dbconfig.php';

//if file upload form is submited
$status = $statusMSG = "";
if (isset($_POST['submit'])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        //Allow certain file formarts
        $allowtypes = array('jpg', 'png','jpeg','gif','avif');
        if(in_array($fileType, $allowtypes)) {
            $image = $_FILES["image"]["name"];
            $imgContent = addslashes(file_get_contents($image));

            //Insert image content into database
            $sql = "INSERT INTO images (image, created) VALUES ('".$imageContent."', now())";
            $insert = $db->query($sql);

            if($insert){
                $status = "Success";
                $statusMSG = "File upload successfull";
            }else {
                $statusMSG = "File upload failed please try again.";
            }
        }else{
            $statusMSG = "Sorry onlyJPG, PNG. AVIF, GIF & PENG files are allowed.";
        }
    }else {
        $statusMSG = "Please select an image file to upload";
    }
}
?>