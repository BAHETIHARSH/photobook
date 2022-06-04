<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="css/photobook.css">
    <script src="js/photobook.js" defer></script>
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
include 'database.php';

// retrive data
$sql = "SELECT * FROM `images`";
$result = ($con->query($sql));
//declare array to store the data of database
$row = []; 

if ($result->num_rows > 0) 
{
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);    
}   


?>
    <!-- Previous Button -->
    <button id="prev-btn" style="z-index: 999;">
        <i class="fas fa-arrow-circle-left"></i>
    </button>


    <!-- Book -->
    <div id="book" class="book">


    <?php
    $n = count($row)/2;

    for ($i=0; $i < count($row) ; $i++) { 
    ?>
        <!-- Paper 1 -->
        <div  class="paper" style="z-index: <?php echo $n ?>">
            <div class="front">
                <div class="front-content">
                    <img src="<?php echo "assets/".$row[$i]['Image_name'];?>">
                </div>
            </div>
            <?php $i++;?>
            <div class="back">
                <div  class="back-content">
                    <img src="<?php echo "assets/".$row[$i]['Image_name'];?>">
                </div>
            </div>
        </div>
  <?php $n--;
} ?>

    </div>

    <!-- Next Button -->
    <button id="next-btn">
        <i class="fas fa-arrow-circle-right"></i>
    </button>



</body>
</html>