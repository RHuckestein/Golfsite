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

    <title>Shopping Cart</title>
  </head>
  <body>

<div class="container">

      <?php

      if (session_status() == PHP_SESSION_NONE) {
          session_start();
          }

          $quantity="";
          $action="";
          $sql="";
          if (isset($_POST['quantity'])) {
            $quantity = trim($_POST['quantity']);
          }

          if ($quantity=='')
          {
            $quantity=1;
          }

          if($quantity <=0)
          {
            echo "The quantity entered is invalid. Please try again.";
          }
          else
          {
              $message="";
            if (isset($_REQUEST['item_code'])) {
            $item_code = $_REQUEST['item_code'];
          }
            if (isset($_REQUEST['item_name'])) {
            $item_name = $_REQUEST['item_name'];
          }
            if (isset($_REQUEST['price'])) {
            $price = $_REQUEST['price'];
          }
            if (isset($_POST['modified_quantity'])) {
            $modified_quantity = $_POST['modified_quantity'];
          }
            $sess = session_id();
            if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
          }

          switch ($action) {

          case "add":
            $sql="SELECT cart_sess, cart_quantity, cart_itemcode, cart_item_name, cart_price from shopping_cart where cart_sess = '$sess' and cart_itemcode like '$item_code'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1) {

                  $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $qt=$row['cart_quantity'];
                  $qt=$qt + $quantity;
                  $sql="UPDATE shopping_cart set cart_quantity=$qt where cart_sess = '$sess' and cart_itemcode like '$item_code'";
                  $result = mysqli_query($conn, $sql);
                }
          else
          {
            $sql = "INSERT INTO shopping_cart (cart_sess, cart_quantity, cart_itemcode, cart_item_name, cart_price) VALUES ('$sess', '$quantity', '$item_code', '$item_name', '$price')";
             $message ="<div align=\"center\"><strong>Item added.</strong></div>";
          }
          break;

          case "change":
          if($modified_quantity==0)
          {
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess' and cart_itemcode like '$item_code'";
          $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
          }
          else
          {
          if($modified_quantity <0)
          {
          echo "Invalid quantity entered";
          }
          else
          {
          $item_code=$cart_itemcode=$_GET['icode'];
          $sql = "UPDATE shopping_cart SET cart_quantity = $modified_quantity  WHERE cart_sess = '$sess' and cart_itemcode like '$item_code'";
          $message = "<div style=\"width:200px; margin:auto;\">Quantity changed</div>";
          }
          }
          break;
          case "delete":
          $item_code=$cart_itemcode=$_GET['icode'];
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess' and cart_itemcode like '$item_code'";
          $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
          break;
          case "empty":
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess'";
          break;
          }
          if($sql !="")
          {
          $result = mysqli_query($conn, $sql);

          echo $message;

          }
          include("showcart.php");
          echo "<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>";
          }
          ?>

</div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>
