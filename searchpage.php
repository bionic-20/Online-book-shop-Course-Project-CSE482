<?php

    require_once "connection.php";

    $query = $_GET['query'];
    $result = mysqli_query($conn, "SELECT * FROM books WHERE (`title` LIKE '%$query%') OR (`author` LIKE '%$query%')");
    
?>




<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'header.php';?>

<div class="row">
  <div class="column left"></div>

  <div class="column middle">
    <h2 style="text-align: center; color: white;">Results:</h2>

    <div class="row">

    <?php    
    if($query=='') : ?>
    <h3 style="text-align: center; color: white;">Enter a term to search</h3>
    
    <?php else : ?>
        <?php foreach($result as $book): ?>
         
            <div class="column">
                <div class="card">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($book['img']).'" width="300px" height="450px">';?>
                <h1> <?php echo htmlspecialchars($book['title']); ?></h1>
                <p><?php echo htmlspecialchars($book['author']); ?></p>
                <p class="price"> <?php echo htmlspecialchars($book['price']); ?> BDT</p>
                
                <form action="bookdetail.php" method="GET">
                <p><button type="Submit">View Product</button></p>
                <input type="hidden" name="id" value="<?php echo $book['id']; ?>" />
                </form>

                </div>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
      
    </div>



  </div>

  <div class="column right"></div>
</div>

<?php include 'footer.php';?>

</body>

</html>