<?php
include "config.php";
          include "opendb.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">ABC Company</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.html">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.html">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Register an Account</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
	<h2>Explore our products below, <?php echo  $_SESSION['complete_name']; ?> ! </h2>
      <?php


         // $item_code=$_REQUEST['item_code'];

          $sql = "SELECT products.item_code, products.item_name, products.description, products.imagename, products.price, product_description.feature1, product_description.feature2, product_description.feature3, product_description.feature4, product_description.feature5, product_description.feature6 FROM products LEFT JOIN product_description ON products.item_code = product_description.item_code";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <h4 class="card-title">
                  <?php
                  echo "Product Name: " . $row["item_name"]. "<br>"; ?>

                </h4>
                <?php
                  $image = $row['imagename'];
                  $image_src = "images/".$image;
                  $item_name=urlencode('$item_name');

                    ?>

                    <?php
                  echo '<img src="'.$image_src.'" /><br />'; ?>

                    <?php
                  $item_name=$row["item_name"];
                  echo "Product Code: " . $item_code=$row["item_code"]. "<br>";
                  echo "Description: " . $row["description"]. "<br>";
                  echo "Price: " . $price=$row["price"]. "<br>";
                  echo "Features: " . $row['feature1']. ", " . $row['feature2'] . ", " . $row['feature3'] . ", " . $row['feature4'] . ", " . $row['feature5'] . ", " . $row['feature6'] . ". <br>";
                      ?>
                  <div class="card-footer">
                    <?php
                    $item_code = str_replace("<br>", "", $item_code);
                    $price = str_replace("<br>", "", $price);
                  echo "<form method=\"POST\" action=\"cart.php?action=add&item_code=$item_code&item_name=$item_name&price=$price\">";
                  echo "<td colspan=\"2\" style=\"font-family:verdana; font-size:150%;\">";
                  echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\">&nbsp;&nbsp;&nbsp;Price: " . $price . "&nbsp;&nbsp;&nbsp;";
                  echo "</td></tr><tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Buy Now\" style=\"font-size:100%;\">";
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\" style=\"font-size:100%;\"></td>";
                  echo"  </form>"; ?>
                  </div>
                </div>
              </div>
            </div>
                  <?php
                }

            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        ?>


</div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>
