<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BigBounty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="auth-form-container text-center p-4 shadow rounded bg-white" style="max-width: 400px; width: 100%;">
            <a href="/" class="d-inline-block mb-4">
                <h1 class="logo">BigBounty</h1>
            </a>
            <h2 class="fw-bold mb-2">Welcome back! 👋</h2>
            <p class="text-muted">Let's get you back to finding amazing bounties</p>
            <button class="btn btn-light w-100 d-flex align-items-center justify-content-center gap-2 mb-3"
                onclick="window.location.href='includes/google-auth.php'">
                <img src="https://www.google.com/favicon.ico" alt="Google" width="20" height="20">
                Continue with Google
            </button>
            <div class="divider my-3">
                <span>or continue with email</span>
            </div>
            <form id="loginForm" class="auth-form" method="POST" action="includes/auth.php">
                <input type="hidden" name="login" value="1">
            
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="loginEmail" name="email" placeholder="name@example.com">
                    <label for="loginEmail">Email address</label>
                    <span class="error" id="loginEmailError">Enter a valid email address.</span>
                </div>
            
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                    <label for="loginPassword">Password</label>
                </div>
            
                <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
                <p class="text-center mb-0">
                    Don't have an account? <a href="register.php" class="text-primary text-decoration-none">Sign up</a>
                </p>
            </form>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    $(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
            type: "POST",
            url: "includes/auth.php",
            data: $(this).serialize(), // Serialize form data
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    alert("Login successful!");
                    window.location.href = "index.php"; // Redirect after success
                } else {
                    alert(response.message); // Show error message
                }
            },
            error: function () {
                alert("Something went wrong! Please try again.");
            },
        });
    });
});

</script>

</html>
