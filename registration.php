<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registraion</title>
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
    <form action="newregistration.php" method="post">
        <table border="0" cellspacing="1" cellpadding="3">
            <tr><td colspan="2" align="center">Enter your information</td></tr>
            <tr><td>Email Address: </td><td><input size="20" type="text" name="emailaddress"></td></tr>
            <tr><td>Password: </td><td><input size="20" type="password" name="password"></td></tr>
            <tr><td>ReType Password:  </td><td><input size="20" type="password" name="repassword"></td></tr>
            <tr><td>Complete Name  </td><td><input size="50" type="text" name="complete_name"></td></tr>
            <tr><td>Address:  </td><td><input size="80" type="text" name="address1"></td></tr>
            <tr><td></td><td><input size="80" type="text" name="address2"></td></tr>
            <tr><td>City:  </td><td><input size="30" type="text" name="city"></td></tr>
            <tr><td>State:  </td><td><input size="30" type="text" name="state"></td></tr>
            <tr><td>Country:  </td><td><input size="30" type="text" name="country"></td></tr>
            <tr><td>Zip Code:  </td><td><input size="20" type="text" name="zipcode"></td></tr>
            <tr><td>Phone No:  </td><td><input size="30" type="text" name="phone_no"></td></tr>
            <tr><td><input type="submit" name="submit" value="Submit"></td><td>
            <input type="reset" value="Cancel"></td></tr>
        </table>
    </form>
  </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>
