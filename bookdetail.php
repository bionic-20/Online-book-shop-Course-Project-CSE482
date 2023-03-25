<?php

    require_once "connection.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM books WHERE `id`='$id'");
    $book = mysqli_fetch_all($result,MYSQLI_ASSOC);
    

?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'header.php';?>


<div class="row">
  <div class="column left">
  </div>

  <div class="column middle" >
         <div class="column" >
             <div class="card" >
             <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($book[0]['img']).'" width="300px" height="450px">';?>
             <h1> <?php echo htmlspecialchars($book[0]['title']); ?></h1>
             <p><?php echo htmlspecialchars($book[0]['author']); ?></p>
             <p class="price"> <?php echo htmlspecialchars($book[0]['price']); ?> BDT</p>
             <p><?php echo htmlspecialchars($book[0]['descr']); ?></p>

             <button id="addcart">Add to Cart</button>
             
             </div>
         </div>
  </div>

  <div class="column right"></div>
</div>

<?php include 'footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type ="text/javascript">

$(document).ready(function(){

$("#addcart").click(function(){
  
        $.ajax({          
            url: "addcart.php",
            method: "POST",
            data: {id:<?php echo $id;?>},

            success:function(){
              alert("Added to cart");             
            }
        });
});
});
</script>

</body>

</html>