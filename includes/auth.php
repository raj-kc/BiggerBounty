<?php
session_start();
require_once '../config/db.php'; // Include database connection

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

// Function to validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password strength
function isValidPassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $password);
}

// **Handle Registration**
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $full_name = sanitize($_POST['full_name']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    // Validation
    if (!preg_match('/^[A-Za-z\s]+$/', $full_name)) {
        die(json_encode(['status' => 'error', 'message' => 'Full name should not contain numbers or special characters.']));
    }

    if (!isValidEmail($email)) {
        die(json_encode(['status' => 'error', 'message' => 'Invalid email address.']));
    }

    if (!isValidPassword($password)) {
        die(json_encode(['status' => 'error', 'message' => 'Password must be at least 6 characters long with at least 1 letter, 1 number, and 1 special character.']));
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die(json_encode(['status' => 'error', 'message' => 'Email already exists.']));
    }
    $stmt->close();

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id; // Get the last inserted user ID

        // Auto-login after registration
        $_SESSION['user_id'] = $user_id;
        $_SESSION['full_name'] = $full_name;

        echo json_encode(['status' => 'success', 'message' => 'Registration successful. Logging in...']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
    }

    $stmt->close();
}

// **Handle Login**
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    if (!isValidEmail($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }

    // Check email in database
    $stmt = $conn->prepare("SELECT user_id, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $full_name, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['full_name'] = $full_name;
            echo json_encode(['status' => 'success', 'message' => 'Login successful. Redirecting...']);
            exit;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email not found.']);
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>