<?php
//include form subscription script
include ('upload.php');
include ("view.php");
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store image in mysql database</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
    <div class="container">
        <h1>Upload and install images using PHP</h1>
        <div class="wrapper">
            <!--display status messages-->
            <p class="status <?php echo $status;?>"><?php echo$statusMSG;?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=""></label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" name= "submit" class="btn-primary" value="upload">
            </form>
        </div>
    </div>
    
</body>
</html>