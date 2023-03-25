<?php

        require_once "connection.php";

        $query = $_POST['input'];
        $result = mysqli_query($conn, "SELECT * FROM books WHERE (`title` LIKE '%$query%') OR (`author` LIKE '%$query%')");
        $books = mysqli_query($conn, "SELECT * FROM books");
?>
    
    <?php    
    if($query=='') : ?>

        <?php foreach($books as $book): ?>
            
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
}