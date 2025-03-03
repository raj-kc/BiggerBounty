<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BigBounty</title>

    <link href="assets/css/auth.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 0.9em; display: none; }
        .valid { color: green; }
        .invalid { color: red; }
        .password-hints span { display: block; font-size: 0.85em; }
        .center-form { display: flex; justify-content: center; align-items: center; min-height: 100vh; }
    </style>
</head>
<body>

<div class="container center-form">
    <div class="col-lg-6">
        <div class="auth-form-container p-4 shadow rounded bg-white">
            <a href="/" class="d-inline-block mb-4 text-center w-100">
                <h1 class="logo">BigBounty</h1>
            </a>
            <h2 class="fw-bold mb-3 text-center">Join the community! 🚀</h2>
            <p class="text-muted text-center">Start your journey to earning bounties today</p>
            
            <form id="registerForm" class="auth-form" method="POST" action="auth.php">
                <input type="hidden" name="register" value="1">
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="fullName" name="full_name" placeholder="John Doe">
                    <label for="fullName">Full Name</label>
                    <span class="error" id="nameError">Full name should not contain numbers or special characters.</span>
                </div>
            
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    <span class="error" id="emailError">Enter a valid email address.</span>
                </div>
            
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>

                    <span class="error" id="passwordError">Password must be at least 6 characters long with at least 1 letter, 1 number, and 1 special character.</span>
        
                    <div class="password-hints mt-2">
                        <span id="length" class="invalid">✔ Minimum 6 characters</span>
                        <span id="letter" class="invalid">✔ At least 1 letter</span>
                        <span id="number" class="invalid">✔ At least 1 number</span>
                        <span id="special" class="invalid">✔ At least 1 special character</span>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary w-100 mb-4">Create Account</button>

                <div class="divider my-3">
                    <span>or continue with email</span>
                </div>

                <button class="btn btn-light w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
                    <img src="https://www.google.com/favicon.ico" alt="Google" width="20" height="20">
                    Continue with Google
                </button>
                <p class="text-center mb-0">
                    Already have an account? <a href="login.php" class="text-primary text-decoration-none">Sign in</a>
                </p>
            </form>
            
            
        </div>
    </div>
</div>


</body>
<script src="assets/js/auth.js"></script>
</html>
<!-- <form id="registerForm" class="auth-form">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="fullName" placeholder="John Doe">
        <label for="fullName">Full Name</label>
        <span class="error" id="nameError">Full name should not contain numbers or special characters.</span>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
        <label for="email">Email address</label>
        <span class="error" id="emailError">Enter a valid email address.</span>
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <label for="password">Password</label>
        <span class="error" id="passwordError">Password must be at least 6 characters long with at least 1 letter, 1 number, and 1 special character.</span>
        
        <div class="password-hints mt-2">
            <span id="length" class="invalid">✔ Minimum 6 characters</span>
            <span id="letter" class="invalid">✔ At least 1 letter</span>
            <span id="number" class="invalid">✔ At least 1 number</span>
            <span id="special" class="invalid">✔ At least 1 special character</span>
        </div>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" id="terms">
        <label class="form-check-label" for="terms">
            I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
        </label>
    </div>
    <button type="submit" class="btn btn-primary w-100 mb-4">Create Account</button>
    <p class="text-center mb-0">
        Already have an account? <a href="login.html" class="text-primary text-decoration-none">Sign in</a>
    </p>
</form> -->