<?php
session_start();
require_once '../config/db.php'; // Database connection
require_once '../vendor/autoload.php'; // Google API client

// Google Client Configuration
$clientID = '518899458124-h0ubdtmlbl6otiq8g86kv643dqvo7nsc.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Internship_project/BiggerBounty/includes/google-auth.php';

// Initialize Google Client
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    // Redirect to Google OAuth
    header('Location: ' . $client->createAuthUrl());
    exit;
} else {
    // Get the access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (isset($token['error'])) {
        // Handle error if any
        die("Google authentication failed: " . $token['error']);
    }
    
    $client->setAccessToken($token);

    // Get user info
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    $googleId = $userInfo->id;
    $fullName = $userInfo->name;
    $email = $userInfo->email;
    $profileImage = $userInfo->picture;

    // Check if the user already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE google_id = ? OR email = ?");
    $stmt->bind_param("ss", $googleId, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, update their details in case they changed their name or profile picture
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        $updateStmt = $conn->prepare("UPDATE users SET full_name = ?, profile_pic = ? WHERE user_id = ?");
        $updateStmt->bind_param("ssi", $fullName, $profileImage, $userId);
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        // New user, register them
        $stmt->close();
        $insertStmt = $conn->prepare("INSERT INTO users (full_name, email, google_id, profile_pic) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("ssss", $fullName, $email, $googleId, $profileImage);
        $insertStmt->execute();
        $userId = $insertStmt->insert_id;
        $insertStmt->close();
    }

    // Store user details in session
    $_SESSION['user_id'] = $userId;
    $_SESSION['full_name'] = $fullName;
    $_SESSION['email'] = $email;
    $_SESSION['profile_pic'] = $profileImage;

    $conn->close();

    // Redirect to dashboard or homepage
    header("Location: ../index.php");
    exit;
}
?>
