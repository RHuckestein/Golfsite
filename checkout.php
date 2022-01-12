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

    <title>Checkout</title>
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

<?php


  if ( ! isset($totalamount)) {
    $totalamount=0;
  }
    $totalquantity=0;
    if (!session_id()) {
    session_start();
  }
    $sessid = session_id();
    $sql = "SELECT cart_sess, cart_itemcode, cart_quantity, cart_item_name, cart_price FROM shopping_cart WHERE cart_sess = '$sessid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0)
  {
  echo "<div style=\"width:200px; margin:auto;\">Your Cart is empty</div> ";
  }
  else
  {
  ?>
  <table border="1" align="center" cellpadding="5">
  <tr><td> Item Code</td><td>Quantity</td><td>Item Name</td><td>Price</td><td>Total Price</td>
  <?php
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        echo "<tr><td>";
        echo $cart_itemcode;
        echo "</td>";
        echo "<td><form method=\"POST\" action=\"cart.php?action=change&icode=$cart_itemcode\"><input type=\"text\" name=\"modified_quantity\" size=\"2\" value=\"$cart_quantity\">";
        echo "</td><td>";
        echo $cart_item_name;
        echo "</td><td>";
        echo $cart_price;
        echo "</td><td>";

        $totalquantity = $totalquantity + $cart_quantity;
        $totalprice = number_format($cart_price * $cart_quantity, 2);
        $totalamount = $totalamount + ($cart_price * $cart_quantity);

        echo $totalprice;
      }
      echo "</td></tr>";
      echo "</table><br>";
      echo "<div style=\"width:400px; margin:auto;\">You currently have " . $totalquantity . " product(s) selected in your cart</div> ";
  ?>

  <table border="0" style="margin:auto;">
  <tr><td  style="padding: 10px;">


    </td><td>

  </td></tr></table>

  <div class="container" >
    <div class="row">
        <div class="col-xs-12 col-md-6"style="margin:auto">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>

                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expiryMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expiryMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expiryYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?php echo "<h3>". $totalamount."</h3>" ;?></span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a href="#" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>
    </div>
</div>

  <?php
  }
  ?>
