<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login_and_registration_style.css">
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>AAAA - Login</title> 


</head>

<body>
  <header>
    <div class="container navbar">
      <div class="logo-area">
        <img src="homepage_image/logo.png" alt="Company Logo"> 

        <div class="logo-text">
          <h1>AAAA</h1>
          <p>Authentic Automotive Assurance Avenue</p>
        </div> 
      </div>

      <nav>
        <a href="homepage.html">Home</a>
        <a href="registration.php">Registration</a>
        <a href="login.php">Login</a>
        <a href="addcar.php">Add Car</a>
        <a href="search.php">Search</a>
      </nav>
    </div>
  </header>

  <section class="login-section">
    <div class="container">
      <div class="login-box">
        <h2>Seller Login</h2>
        <p>Please enter your username and password to access your seller account.</p>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] === "empty") {
                echo "<p class='error-message'>Username and password are required.</p>";
            } elseif ($_GET["error"] === "invalid") {
                echo "<p class='error-message'>The information entered is invalid.</p>";
            } elseif ($_GET["error"] === "server") {
                echo "<p class='error-message'>Server error. Please try again later.</p>";
            }
        }
        ?>
        
        <form method="POST" action="login_process.php" onsubmit="return checkLoginForm();">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
          </div> 

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
          </div> 

          <button type="submit" class="login-button">Login</button>

          <p class="register-link">
            Don't have an account? <a href="registration.php">Register here</a>
          </p> 
        </form>
      </div>
    </div>
  </section>
  <script src="login_and_registration_script.js"></script>
</body>
</html>