<?php

    require_once "connection.php";

    $sql = 'SELECT title, price, img, author,id FROM books';

    $result = mysqli_query($conn, $sql);

    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);


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
    <h2 style="text-align: center; color: white;">Featured Books:</h2>

    

    <div class="row">
        <?php foreach(array_slice($books,4,8) as $book): ?>      
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
      
    </div>
    



  </div>

  <div class="column right"></div>
</div>

<?php include 'footer.php';?>

</body>

</html>