<?php

require_once "connection.php";

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
    
  <h2 style="text-align: left; color: white;">Filter books:</h2>

    <input type="text" class="search-bar" id="live_search" autocomplete="off" placeholder="Search by title or author name..">

    <div id="searchresult"></div>


  </div>

  <div class="column right"></div>
</div>

<?php include 'footer.php';?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type ="text/javascript">

    $.ajax({
                    
        url: "livesearch.php",
        method: "POST",
        data: {input:''},

        success:function(data){
        $("#searchresult").html(data);
        $("#searchresult").css("display","block");
                        
         }
    });

    $(document).ready(function(){

        $("#live_search").keyup(function(){

            var input = $(this).val();

            if(input != " "){
                $.ajax({
                    
                    url: "livesearch.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");
                        
                    }
                });
            }else{

                $("#searchresult").css("display","none");

            }
        });
    });
</script>

</body>

</html>