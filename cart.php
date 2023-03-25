<?php 
require 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body style="background-image: url('');">

<?php include 'header.php';
?>

<div class="row">
  <div class="column left" color: black;></div>

  <div class="column middle" style= "background-color: white; color: black;">

  <?php 
  
  if(isset($_SESSION["cart"]) == true): ?>
   
  <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:right;" width="7%">Price</th>

  <?php	$total =0; 
        $id=$_SESSION['cart'];
        foreach ($id as $id): ?>

           <?php $books = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
            foreach($books as $item): 
                
                $item_price = $item["price"];
                $total += $item_price;?>    
                <table class="tbl-cart" cellpadding="10" cellspacing="1" style="border: 1px solid black">
                <tbody>
                <tr>
                <th style="text-align:left;"></th>
                <th style="text-align:right;" width="10%"></th>
                </tr>	
				<tr>
                <td><?php echo $item["title"]; ?></td>
				<td  style="text-align:right;"><?php echo "BDT ".$item["price"]; ?></td>
				</tr>
            <tr>
            <td></td>
            </tr>
            </tbody>
            </table>	
            <?php endforeach ?>    
    <?php endforeach ?>     


    <h3 style="width:20%">Total price: <?php echo $total ?> <h3>
    <a href="checkout.php?price=<?php echo $total?>"><button>Checkout</button></a>
    <button id="removecart">Clear cart</button>

<?php else: ?>
    <h1>Cart is empty<h1>
<?php endif ?>
  </div>


  <div class="column right"></div>
</div>

<?php include 'footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type ="text/javascript">

$(document).ready(function(){

$("#removecart").click(function(){
  
        $.ajax({          
            url: "removecart.php",

            success:function(){
              window.location.reload();
              alert("Items removed");             
            }
        });
});
});
</script>

</body>

</html>