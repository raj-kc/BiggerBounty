<?php
session_start();
require 'config/db.php'; // Database connection

//  Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

//  Fetch user data from the database
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

//  If user data not found, redirect to login
if (!$user) {
    header("Location: login.php");
    exit();
}

// Format join date
$join_date = date("M Y", strtotime($user['created_at']));

//  Set profile picture (if exists, else use default)
$userImage = !empty($user['profile_pic']) ? htmlspecialchars($user['profile_pic']) : "assets/images/default-avatar.png";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - BigBounty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/user_profile.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>
<body class="profile-page">
    <?php include 'partials/header.php'; ?>

    <div class="profile-header">
        <div class="profile-container">
            <div class="profile-info">
                <div class="profile-avatar-container">
                    <div class="profile-avatar">
                        <img src="<?= htmlspecialchars($user['profile_image'] ?? 'default.png'); ?>" 
                             alt="Profile image">
                    </div>
                </div>
                <div class="profile-details">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1>
                        <?= htmlspecialchars($user['full_name']); ?>
                        </h1>
                        <button class="btn btn-outline-primary btn-sm d-none d-md-flex edit-profile-btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil me-2"></i>Edit Profile
                        </button>
                    </div>
                    <p class="profile-title"><?= htmlspecialchars($user['job_title'] ?? 'Member'); ?></p>
                    <div class="profile-meta">
                        <div class="meta-item">
                            <i class="bi bi-telephone"></i>
                            <span><?= htmlspecialchars($user['phone_no'] ?? 'Not specified'); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-clock"></i>
                            <span>Member since <?= $join_date; ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-envelope-at"></i>
                            <span><?= htmlspecialchars($user['email'] ?? 'Not specified'); ?></span>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-sm d-md-none mt-3 w-100 edit-profile-btn-mobile" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil me-2"></i>Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="profile-container">
        <div class="profile-content">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <!-- Enhanced Wallet Card -->
                <div class="wallet-card">
                    <div class="wallet-header">
                        <h2>Wallet</h2>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#bankDetailsModal">
                                    <i class="bi bi-bank me-2"></i>Manage Bank Details
                                </a></li>
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-file-earmark-text me-2"></i>Transaction History
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wallet-balance">
                        <div class="balance-label">Total Balance</div>
                        <div class="balance-amount">₹45,000</div>
                    </div>
                    <div class="wallet-details">
                        <div class="wallet-detail-item">
                            <div class="detail-label">
                                <i class="bi bi-arrow-down-circle"></i>
                                Deposits
                            </div>
                            <div class="detail-value">₹75,000</div>
                        </div>
                        <div class="wallet-detail-item">
                            <div class="detail-label">
                                <i class="bi bi-trophy"></i>
                                Total Earnings
                            </div>
                            <div class="detail-value">₹150,000</div>
                        </div>
                        <div class="wallet-detail-item">
                            <div class="detail-label">
                                <i class="bi bi-hourglass-split"></i>
                                Pending
                            </div>
                            <div class="detail-value text-warning">₹15,000</div>
                        </div>
                    </div>
                    <div class="wallet-actions">
                        <button class="btn-deposit" data-bs-toggle="modal" data-bs-target="#depositModal">
                            <i class="bi bi-plus-circle"></i>
                            Deposit
                        </button>
                        <button class="btn-withdraw" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                            <i class="bi bi-wallet2"></i>
                            Withdraw
                        </button>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="stats-card">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-value">25</div>
                            <div class="stat-label">Bounties</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.9</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">98%</div>
                            <div class="stat-label">Success</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">₹150k</div>
                            <div class="stat-label">Earned</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content with Tabs -->
            <div class="profile-main">
                <!-- Tab Navigation -->
                <div class="profile-tabs">
                    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button" role="tab" aria-controls="activities" aria-selected="true">
                                <i class="bi bi-activity"></i> Recent Activities
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="posted-tab" data-bs-toggle="tab" data-bs-target="#posted" type="button" role="tab" aria-controls="posted" aria-selected="false">
                                <i class="bi bi-plus-circle"></i> Bounties Posted
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="submitted-tab" data-bs-toggle="tab" data-bs-target="#submitted" type="button" role="tab" aria-controls="submitted" aria-selected="false">
                                <i class="bi bi-check-circle"></i> Bounties Submitted
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="tab-content" id="profileTabsContent">
                    <!-- Recent Activities Tab -->
                    <div class="tab-pane fade show active" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                        <div class="activity-section">
                            <div class="section-header">
                                <h2>Recent Transactions</h2>
                                <a href="#" class="btn btn-link">View All</a>
                            </div>
                            <div class="transaction-list">
                                <div class="transaction-item">
                                    <div class="transaction-icon received">
                                        <i class="bi bi-arrow-down-left"></i>
                                    </div>
                                    <div class="transaction-info">
                                        <h3 class="transaction-title">Smart Contract Audit Bounty</h3>
                                        <span class="transaction-date">Today, 2:30 PM</span>
                                    </div>
                                    <div class="transaction-amount received">+₹15,000</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="transaction-icon withdrawn">
                                        <i class="bi bi-arrow-up-right"></i>
                                    </div>
                                    <div class="transaction-info">
                                        <h3 class="transaction-title">Withdrawal to Bank</h3>
                                        <span class="transaction-date">Yesterday, 4:15 PM</span>
                                    </div>
                                    <div class="transaction-amount withdrawn">-₹25,000</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="transaction-icon received">
                                        <i class="bi bi-arrow-down-left"></i>
                                    </div>
                                    <div class="transaction-info">
                                        <h3 class="transaction-title">UI/UX Design Bounty</h3>
                                        <span class="transaction-date">Jan 15, 2024</span>
                                    </div>
                                    <div class="transaction-amount received">+₹12,500</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="transaction-icon deposit">
                                        <i class="bi bi-plus-circle"></i>
                                    </div>
                                    <div class="transaction-info">
                                        <h3 class="transaction-title">Deposit from Bank</h3>
                                        <span class="transaction-date">Jan 10, 2024</span>
                                    </div>
                                    <div class="transaction-amount deposit">+₹20,000</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bounties Posted Tab -->
                    <div class="tab-pane fade" id="posted" role="tabpanel" aria-labelledby="posted-tab">
                        <div class="bounties-section">
                            <div class="section-header">
                                <h2>Bounties Posted</h2>
                                <a href="create-bounty.php" class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-lg"></i> Post New
                                </a>
                            </div>
                            <div class="bounty-list">
                                <div class="bounty-item">
                                    <div class="bounty-status active">Active</div>
                                    <div class="bounty-content">
                                        <h3 class="bounty-title">Mobile App UI Development</h3>
                                        <div class="bounty-meta">
                                            <span><i class="bi bi-calendar"></i> Posted: Jan 5, 2024</span>
                                            <span><i class="bi bi-people"></i> 8 Submissions</span>
                                            <span><i class="bi bi-trophy"></i> ₹25,000</span>
                                        </div>
                                        <div class="bounty-tags">
                                            <span class="tag">UI/UX</span>
                                            <span class="tag">Mobile</span>
                                            <span class="tag">React Native</span>
                                        </div>
                                    </div>
                                    <div class="bounty-actions">
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                    </div>
                                </div>
                                <div class="bounty-item">
                                    <div class="bounty-status completed">Completed</div>
                                    <div class="bounty-content">
                                        <h3 class="bounty-title">API Integration for Payment Gateway</h3>
                                        <div class="bounty-meta">
                                            <span><i class="bi bi-calendar"></i> Posted: Dec 15, 2023</span>
                                            <span><i class="bi bi-people"></i> 12 Submissions</span>
                                            <span><i class="bi bi-trophy"></i> ₹30,000</span>
                                        </div>
                                        <div class="bounty-tags">
                                            <span class="tag">Backend</span>
                                            <span class="tag">API</span>
                                            <span class="tag">Payment</span>
                                        </div>
                                    </div>
                                    <div class="bounty-actions">
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bounties Submitted Tab -->
                    <div class="tab-pane fade" id="submitted" role="tabpanel" aria-labelledby="submitted-tab">
                        <div class="bounties-section">
                            <div class="section-header">
                                <h2>Bounties Submitted</h2>
                                <a href="bounties.html" class="btn btn-primary btn-sm">
                                    <i class="bi bi-search"></i> Find More
                                </a>
                            </div>
                            <div class="bounty-list">
                                <div class="bounty-item">
                                    <div class="bounty-status accepted">Accepted</div>
                                    <div class="bounty-content">
                                        <h3 class="bounty-title">Smart Contract Audit</h3>
                                        <div class="bounty-meta">
                                            <span><i class="bi bi-building"></i> DeFi Protocol</span>
                                            <span><i class="bi bi-calendar"></i> Submitted: Jan 10, 2024</span>
                                            <span><i class="bi bi-trophy"></i> ₹15,000</span>
                                        </div>
                                        <div class="bounty-tags">
                                            <span class="tag">Solidity</span>
                                            <span class="tag">Security</span>
                                            <span class="tag">DeFi</span>
                                        </div>
                                    </div>
                                    <div class="bounty-actions">
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                                <div class="bounty-item">
                                    <div class="bounty-status pending">Pending</div>
                                    <div class="bounty-content">
                                        <h3 class="bounty-title">Frontend Bug Fixes</h3>
                                        <div class="bounty-meta">
                                            <span><i class="bi bi-building"></i> TechCorp</span>
                                            <span><i class="bi bi-calendar"></i> Submitted: Jan 18, 2024</span>
                                            <span><i class="bi bi-trophy"></i> ₹8,000</span>
                                        </div>
                                        <div class="bounty-tags">
                                            <span class="tag">React</span>
                                            <span class="tag">JavaScript</span>
                                            <span class="tag">Debugging</span>
                                        </div>
                                    </div>
                                    <div class="bounty-actions">
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                    </div>
                                </div>
                                <div class="bounty-item">
                                    <div class="bounty-status rejected">Rejected</div>
                                    <div class="bounty-content">
                                        <h3 class="bounty-title">Database Optimization</h3>
                                        <div class="bounty-meta">
                                            <span><i class="bi bi-building"></i> DataSystems</span>
                                            <span><i class="bi bi-calendar"></i> Submitted: Dec 5, 2023</span>
                                            <span><i class="bi bi-trophy"></i> ₹12,000</span>
                                        </div>
                                        <div class="bounty-tags">
                                            <span class="tag">SQL</span>
                                            <span class="tag">Database</span>
                                            <span class="tag">Performance</span>
                                        </div>
                                    </div>
                                    <div class="bounty-actions">
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="edit-profile-tabs">
                        <ul class="nav nav-pills mb-4" id="editProfileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="pill" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Personal Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="editProfileTabContent">
                            <!-- Personal Info Tab -->
                            <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                <form class="row g-3">
                                    <div class="col-12 text-center mb-4">
                                        <div class="profile-image-upload">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=150&h=150&q=80" 
                                                 alt="Profile Image" class="profile-image-preview">
                                            <div class="image-upload-overlay">
                                                <i class="bi bi-camera"></i>
                                                <span>Change Photo</span>
                                            </div>
                                            <input type="file" class="d-none" id="profileImageUpload">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" value="John Developer">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" value="john@example.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone" value="+91 9876543210">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender">
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                            <option value="prefer-not-to-say">Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" value="Mumbai, India">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="languages" class="form-label">Languages</label>
                                        <input type="text" class="form-control" id="languages" value="English, Hindi">
                                    </div>
                                    <div class="col-12">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="bio" rows="3">Senior Full Stack Developer with 5+ years of experience in web and blockchain development.</textarea>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Security Tab -->
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <form class="row g-3">
                                    <div class="col-12">
                                        <label for="currentPassword" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="currentPassword">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="newPassword">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirmPassword">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                                            <label class="form-check-label" for="twoFactorAuth">
                                                Enable Two-Factor Authentication
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Details Modal -->
    <div class="modal fade" id="bankDetailsModal" tabindex="-1" aria-labelledby="bankDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bankDetailsModalLabel">Manage Bank Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="saved-accounts mb-4">
                        <h6 class="mb-3">Saved Accounts</h6>
                        <div class="saved-account-item active">
                            <div class="account-info">
                                <div class="bank-logo">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="account-details">
                                    <p class="account-name">HDFC Bank</p>
                                    <p class="account-number">XXXX XXXX 1234</p>
                                </div>
                            </div>
                            <div class="account-actions">
                                <span class="badge bg-success">Primary</span>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saved-account-item">
                            <div class="account-info">
                                <div class="bank-logo">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="account-details">
                                    <p class="account-name">SBI Bank</p>
                                    <p class="account-number">XXXX XXXX 5678</p>
                                </div>
                            </div>
                            <div class="account-actions">
                                <button class="btn btn-sm btn-outline-primary make-primary-btn">Make Primary</button>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="add-new-account">
                        <h6 class="mb-3">Add New Account</h6>
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="accountHolderName" class="form-label">Account Holder Name</label>
                                <input type="text" class="form-control" id="accountHolderName">
                            </div>
                            <div class="col-md-6">
                                <label for="bankName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bankName">
                            </div>
                            <div class="col-md-6">
                                <label for="accountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="accountNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="ifscCode" class="form-label">IFSC Code</label>
                                <input type="text" class="form-control" id="ifscCode">
                            </div>
                            <div class="col-12">
                                <label for="accountType" class="form-label">Account Type</label>
                                <select class="form-select" id="accountType">
                                    <option selected disabled value="">Choose...</option>
                                    <option>Savings</option>
                                    <option>Current</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="makePrimary">
                                    <label class="form-check-label" for="makePrimary">
                                        Make this my primary account
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Account</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Funds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="deposit-methods mb-4">
                        <h6 class="mb-3">Select Payment Method</h6>
                        <div class="payment-methods-list">
                            <div class="payment-method-item active">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" checked>
                                    <label class="form-check-label" for="bankTransfer">
                                        <div class="payment-method-icon">
                                            <i class="bi bi-bank"></i>
                                        </div>
                                        <div class="payment-method-details">
                                            <p class="payment-method-name">Bank Transfer</p>
                                            <p class="payment-method-desc">Direct transfer from your bank account</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="payment-method-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="upi">
                                    <label class="form-check-label" for="upi">
                                        <div class="payment-method-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                        <div class="payment-method-details">
                                            <p class="payment-method-name">UPI</p>
                                            <p class="payment-method-desc">Pay using UPI apps like Google Pay, PhonePe</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="payment-method-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="card">
                                    <label class="form-check-label" for="card">
                                        <div class="payment-method-icon">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                        <div class="payment-method-details">
                                            <p class="payment-method-name">Credit/Debit Card</p>
                                            <p class="payment-method-desc">Pay using Visa, Mastercard, RuPay</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="deposit-amount">
                        <h6 class="mb-3">Enter Amount</h6>
                        <div class="input-group mb-3">
                            <span class="input-group-text">₹</span>
                            <input type="number" class="form-control" placeholder="Amount" aria-label="Amount">
                        </div>
                        <div class="quick-amounts">
                            <button class="quick-amount-btn">₹1,000</button>
                            <button class="quick-amount-btn">₹5,000</button>
                            <button class="quick-amount-btn">₹10,000</button>
                            <button class="quick-amount-btn">₹25,000</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Proceed to Pay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawModalLabel">Withdraw Funds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="withdraw-to mb-4">
                        <h6 class="mb-3">Withdraw To</h6>
                        <select class="form-select mb-3">
                            <option selected>HDFC Bank - XXXX XXXX 1234 (Primary)</option>
                            <option>SBI Bank - XXXX XXXX 5678</option>
                            <option>Add New Account...</option>
                        </select>
                    </div>
                    
                    <div class="withdraw-amount">
                        <h6 class="mb-3">Enter Amount</h6>
                        <div class="input-group mb-3">
                            <span class="input-group-text">₹</span>
                            <input type="number" class="form-control" placeholder="Amount" aria-label="Amount">
                        </div>
                        <div class="available-balance">
                            <p>Available Balance: <span class="fw-bold">₹45,000</span></p>
                        </div>
                        <div class="quick-amounts">
                            <button class="quick-amount-btn">₹5,000</button>
                            <button class="quick-amount-btn">₹10,000</button>
                            <button class="quick-amount-btn">₹25,000</button>
                            <button class="quick-amount-btn">All</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Withdraw</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile image upload preview
            const profileImageUpload = document.getElementById('profileImageUpload');
            const profileImagePreview = document.querySelector('.profile-image-preview');
            const imageUploadOverlay = document.querySelector('.image-upload-overlay');
            
            if (imageUploadOverlay) {
                imageUploadOverlay.addEventListener('click', function() {
                    profileImageUpload.click();
                });
            }
            
            if (profileImageUpload) {
                profileImageUpload.addEventListener('change', function(e) {
                    if (e.target.files.length > 0) {
                        const file = e.target.files[0];
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            profileImagePreview.src = e.target.result;
                        };
                        
                        reader.readAsDataURL(file);
                    }
                });
            }
            
            // Quick amount buttons
            const quickAmountBtns = document.querySelectorAll('.quick-amount-btn');
            quickAmountBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const amountInput = this.closest('.modal-body').querySelector('input[type="number"]');
                    const amount = this.textContent.replace('₹', '').replace(',', '').trim();
                    
                    if (amount === 'All') {
                        // For withdraw modal, set to available balance
                        const availableBalance = document.querySelector('.available-balance .fw-bold');
                        if (availableBalance) {
                            amountInput.value = availableBalance.textContent.replace('₹', '').replace(',', '').trim();
                        }
                    } else {
                        amountInput.value = amount;
                    }
                });
            });
            
            // Payment method selection
            const paymentMethodItems = document.querySelectorAll('.payment-method-item');
            paymentMethodItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    paymentMethodItems.forEach(i => i.classList.remove('active'));
                    // Add active class to clicked item
                    this.classList.add('active');
                    // Check the radio button
                    const radio = this.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                    }
                });
            });
        });
    </script>
</body>
</html>