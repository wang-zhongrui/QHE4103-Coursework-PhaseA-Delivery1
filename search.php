<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Search Page</title>
        <link rel="stylesheet" href="search_style.css">
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

        
        <br/>

        <main class="addcar-section">
            <div class="container">
                <div class="links-box">
                    <div class="addcar-title">
                        <h2>Search Car</h2>
                    </div>

                    <form onsubmit="return searchCars(event)"> 
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ml">Model</label>
                                <input type="text" id="ml" name="model">
                            </div>

                            <div class="form-group">
                                <label for="yr">Year</label>
                                <input type="text" id="yr" name="year">
                            </div>
                        </div>
                        <button type="submit">Search</button>
                    </form>
        
                </div>
            </div>
        </main>

        <div class="links-section">
            <div class="container">
                <div class="links-box">
                    <div class="page-links" id="results"></div>
                </div>
            </div>
        </div>

        <div class="modal-overlay" id="modalOverlay">
            <div class="modal">
                <button class="close-modal" id="closeModal">×</button>
                <div class="modal-content" id="modalContent"></div>
            </div>
        </div>

        <script src="search_script.js"></script>
    </body>
</html>