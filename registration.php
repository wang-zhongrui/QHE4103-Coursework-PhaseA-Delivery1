<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login_and_registration_style.css">
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>AAAA - Registration</title> 
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

  <section class="register-section">
    <div class="container">
      <div class="register-box">
        <h2>Seller Registration</h2>
        <p>Please complete the form below to create your seller account.</p>

        <form method="POST" action="registration_process.php" onsubmit="return checkRegistrationForm();">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
          </div> 

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address">
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone">
          </div> 

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email">
          </div> 

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
          </div> 

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
          </div>

          <button type="submit" class="register-button">Register</button> 

          <p class="login-link">
            Already have an account? <a href="login.php">Login here</a>
          </p> 
        </form>
      </div>
    </div>
  </section>

  <script src="login_and_registration_script.js"></script>
</body>
</html>