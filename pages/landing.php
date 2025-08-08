<!DOCTYPE html>
<html>
<head>
    <title>Personal Best Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Mozilla+Text&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">

    <!-- Navigation Bar -->
    <nav class="nav">
        <div class="nav-logo">
            <img src="/MetaUnoPb/Images/hub.png" alt="Hub Logo">
        </div>

        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="#" class="Dashboard active">Milestone Tracker</a></li>
            </ul>
        </div>

        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>

        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <!-- Form Box -->
    <div class="form-box">

        <!-- Login Form -->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>

            <form action="login.php" method="POST">
                <div class="input-box">
                    <input type="text" name="email" class="input-field" placeholder="Email" required>
                    <i class="bx bx-user"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>

                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>

            <form action="register.php" method="POST">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" name="fname" class="input-field" placeholder="Firstname" required>
                        <i class="bx bx-user"></i>
                    </div>

                    <div class="input-box">
                        <input type="text" name="lname" class="input-field" placeholder="Lastname" required>
                        <i class="bx bx-user"></i>
                    </div>
                </div>

                <div class="input-box">
                    <input type="email" name="email" class="input-field" placeholder="Email" required>
                    <i class="bx bx-envelope"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>

                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Remember Me</label>
                    </div>
                </div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
            </form>
        </div>

    </div>
</div>

<script src="script.js"></script>
</body>
</html>