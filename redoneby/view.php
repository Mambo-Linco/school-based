<?php
//include the database configuration file
require_once "dbconfig.php";
//Get image data from the database
$sql = "SELECT * FROM IMAGES";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieving images using php</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>
    <div class="container">
        <h1>retrieve imeges from database using php</h1>
        <div class="gallery">
            <?php if ($result->num_rows > 0) {?>
            <div class="img-box">
                <?php while($row = $result->fetch_assoc()) { ?>
                    <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row["image"]);?>"/>

                <?php } ?>
            </div>
            <?php }else{?>
            <p class="status error">image(s) not found....</p>
            <?php } ?>
        </div>
        <a href="index.php">Upload images</a>

    </div>
    
</body>
</html>