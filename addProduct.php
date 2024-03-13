<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="styleProducts.css">

</head>

<body>





  <div>
 

    <div class="container-box">
        <h1>Add Product</h1>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      
        <input type="text" name="name" placeholder="name..."> <br><br>
        <input type="text" name="price" placeholder="price..."> <br><br>

        <input type="submit" name="addProduct" value="Add "><br><br>


      </form>
      <a href="Productshow.php">Check current menu</a><br><br>

      <?php include_once 'addProductController.php'; ?>

    </div>
  </div>

  <script type="text/javascript" src="index.js"></script>


</body>


</html>