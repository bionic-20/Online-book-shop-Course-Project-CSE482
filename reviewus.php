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

    <form id="login" method="get" action="login.php"> 
        <label><b>Email     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Email">    
        <br><br>    
        <label><b>Feedback     
        </b>    
        </label>    
        <input type="text" name="Pass" id="Pass" placeholder="Review">    
        <br><br>    
        <button> Submit </button>       
    </form>     
  </div>

  <div class="column right"></div>
</div>

<?php include 'footer.php';?>

</body>

</html>