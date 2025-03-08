<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bounty - BigBounty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/create-bounty.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="create-bounty-page bg-light">
    <!-- Header -->
     
    <?php include 'partials/header.php'; ?>

    <!-- Main Content -->
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Page Header -->
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold mb-3">Create a New Bounty</h1>
                    <p class="text-muted lead">Find talented developers to solve your technical challenges</p>
                </div>

                <!-- Progress Steps -->
                <div class="progress-steps mb-5">
                    <div class="step" data-step="1">
                        <div class="step-icon">
                            <i class="bi bi-1-circle-fill"></i>
                        </div>
                        <div class="step-label">Basic Info</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-icon">
                            <i class="bi bi-2-circle"></i>
                        </div>
                        <div class="step-label">Requirements</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-icon">
                            <i class="bi bi-3-circle"></i>
                        </div>
                        <div class="step-label">Reward</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-icon">
                            <i class="bi bi-4-circle"></i>
                        </div>
                        <div class="step-label">Review</div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <form class="create-bounty-form" id="createBountyForm">
                            <!-- Step 1: Basic Information -->
                            <div class="form-step active" data-step="1">
                                <h3 class="card-title mb-4">Basic Information</h3>
                                
                                <div class="mb-4">
                                    <label class="form-label">Bounty Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter a clear, descriptive title">
                                    <div class="form-text">Make it specific and attention-grabbing</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="categorySelect">
                                        <option value="" selected disabled>Select category</option>
                                        <option value="blockchain">Blockchain Development</option>
                                        <option value="smart-contracts">Smart Contracts</option>
                                        <option value="web3">Web3 Integration</option>
                                        <option value="defi">DeFi Solutions</option>
                                        <option value="security">Security & Auditing</option>
                                        <option value="frontend">Frontend Development</option>
                                        <option value="backend">Backend Development</option>
                                        <option value="mobile">Mobile Development</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div id="otherCategoryInput" class="mt-3" style="display: none;">
                                        <input type="text" class="form-control" placeholder="Enter custom category">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="6" placeholder="Describe your bounty in detail"></textarea>
                                    <div class="form-text">Include context, objectives, and expected outcomes</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Tags</label>
                                    <div class="tag-input-container">
                                        <input type="text" class="form-control" id="tagInput" placeholder="Add relevant tags">
                                        <div class="tag-suggestions" style="display: none;">
                                            <!-- Tag suggestions will be populated here -->
                                        </div>
                                    </div>
                                    <div class="selected-tags mt-2">
                                        <!-- Selected tags will be displayed here -->
                                    </div>
                                    <div class="form-text">Example: Solidity, React, Node.js</div>
                                </div>
                            </div>

                            <!-- Step 2: Requirements -->
                            <div class="form-step" data-step="2">
                                <h3 class="card-title mb-4">Requirements & Specifications</h3>

                                <div class="mb-4">
                                    <label class="form-label">Required Skills <span class="text-danger">*</span></label>
                                    <div class="skills-selector">
                                        <div class="selected-skills mb-3">
                                            <!-- Selected skills will be displayed here -->
                                        </div>
                                        <input type="text" class="form-control" id="skillInput" placeholder="Type to add skills">
                                        <div class="skill-suggestions" style="display: none;">
                                            <!-- Skill suggestions will be populated here -->
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Experience Level <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check custom-radio">
                                                <input type="radio" class="form-check-input" name="experienceLevel" id="beginner">
                                                <label class="form-check-label" for="beginner">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-star-fill text-warning me-2"></i>
                                                        Beginner
                                                    </div>
                                                    <small class="text-muted d-block">0-2 years experience</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check custom-radio">
                                                <input type="radio" class="form-check-input" name="experienceLevel" id="intermediate">
                                                <label class="form-check-label" for="intermediate">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-stars text-warning me-2"></i>
                                                        Intermediate
                                                    </div>
                                                    <small class="text-muted d-block">2-5 years experience</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check custom-radio">
                                                <input type="radio" class="form-check-input" name="experienceLevel" id="expert">
                                                <label class="form-check-label" for="expert">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-award-fill text-warning me-2"></i>
                                                        Expert
                                                    </div>
                                                    <small class="text-muted d-block">5+ years experience</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Attachments</label>
                                    <div class="file-upload-container">
                                        <div class="file-upload-area">
                                            <i class="bi bi-cloud-upload display-4 text-primary"></i>
                                            <p class="mb-2">Drag & drop files here or</p>
                                            <button type="button" class="btn btn-outline-primary btn-sm">Browse Files</button>
                                            <input type="file" class="d-none" multiple>
                                        </div>
                                        <div class="form-text">Max file size: 10MB. Supported formats: PDF, DOC, ZIP</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Reward -->
                            <div class="form-step" data-step="3">
                                <h3 class="card-title mb-4">Reward & Payment</h3>

                                <!-- Wallet Balance -->
                                <div class="wallet-balance mb-4">
                                    <div class="wallet-balance-label">Available Balance</div>
                                    <div class="wallet-balance-amount">₹100,000</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Reward Amount <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="totalReward" placeholder="Enter amount">
                                    </div>
                                    <div class="form-text">Platform fee: 5% of total reward</div>
                                </div>

                                <div class="winner-selection mb-4">
                                    <label class="form-label">Winner Selection <span class="text-danger">*</span></label>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="winnerType" id="singleWinner" checked>
                                        <label class="form-check-label" for="singleWinner">
                                            Single Winner (95% of total reward)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="winnerType" id="multipleWinners">
                                        <label class="form-check-label" for="multipleWinners">
                                            Multiple Winners
                                        </label>
                                    </div>

                                    <div id="winnerDistribution" class="winner-distribution mt-3" style="display: none;">
                                        <h6 class="mb-3">Reward Distribution</h6>
                                        <div class="winner-rows">
                                            <div class="winner-row">
                                                <div class="winner-rank">1st Place</div>
                                                <div class="winner-percentage">
                                                    <input type="number" class="form-control" placeholder="Percentage" max="95">
                                                </div>
                                                <div class="winner-amount text-muted">₹0</div>
                                            </div>
                                            <div class="winner-row">
                                                <div class="winner-rank">2nd Place</div>
                                                <div class="winner-percentage">
                                                    <input type="number" class="form-control" placeholder="Percentage" max="95">
                                                </div>
                                                <div class="winner-amount text-muted">₹0</div>
                                            </div>
                                            <div class="winner-row">
                                                <div class="winner-rank">3rd Place</div>
                                                <div class="winner-percentage">
                                                    <input type="number" class="form-control" placeholder="Percentage" max="95">
                                                </div>
                                                <div class="winner-amount text-muted">₹0</div>
                                            </div>
                                        </div>
                                        <div class="total-distribution">
                                            <div class="d-flex justify-content-between">
                                                <span>Total Distribution:</span>
                                                <span class="total-percentage">0%</span>
                                            </div>
                                            <div class="form-text text-danger">Total distribution must equal 95%</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                                    <div class="payment-methods">
                                        <div class="payment-method-card active">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="walletPayment" checked>
                                                <label class="form-check-label" for="walletPayment">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-wallet2 text-primary me-2"></i>
                                                        Wallet Balance
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment-method-card">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypalPayment">
                                                <label class="form-check-label" for="paypalPayment">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-paypal text-primary me-2"></i>
                                                        PayPal
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Timeline</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Deadline <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Review -->
                            <div class="form-step" data-step="4">
                                <h3 class="card-title mb-4">Review Your Bounty</h3>

                                <div class="review-section mb-4">
                                    <h5 class="review-section-title">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Basic Information
                                    </h5>
                                    <div class="review-content">
                                        <div class="review-item">
                                            <span class="review-label">Title:</span>
                                            <span class="review-value">Smart Contract Security Audit</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Category:</span>
                                            <span class="review-value">Security & Auditing</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Tags:</span>
                                            <span class="review-value">
                                                <span class="badge bg-light text-dark me-1">Solidity</span>
                                                <span class="badge bg-light text-dark me-1">Security</span>
                                                <span class="badge bg-light text-dark">DeFi</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-section mb-4">
                                    <h5 class="review-section-title">
                                        <i class="bi bi-list-check me-2"></i>
                                        Requirements
                                    </h5>
                                    <div class="review-content">
                                        <div class="review-item">
                                            <span class="review-label">Experience Level:</span>
                                            <span class="review-value">Expert</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Required Skills:</span>
                                            <span class="review-value">
                                                <span class="badge bg-primary me-1">Solidity</span>
                                                <span class="badge bg-primary me-1">Smart Contracts</span>
                                                <span class="badge bg-primary">Security Auditing</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-section mb-4">
                                    <h5 class="review-section-title">
                                        <i class="bi bi-currency-dollar me-2"></i>
                                        Reward & Timeline
                                    </h5>
                                    <div class="review-content">
                                        <div class="review-item">
                                            <span class="review-label">Total Reward:</span>
                                            <span class="review-value">₹50,000</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Winner Type:</span>
                                            <span class="review-value">Single Winner</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Payment Method:</span>
                                            <span class="review-value">Wallet Balance</span>
                                        </div>
                                        <div class="review-item">
                                            <span class="review-label">Timeline:</span>
                                            <span class="review-value">Feb 1, 2024 - Feb 15, 2024</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="termsCheck">
                                    <label class="form-check-label" for="termsCheck">
                                        I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Form Navigation -->
                            <div class="form-navigation mt-4">
                                <button type="button" class="btn btn-outline-primary btn-lg px-4 me-2 btn-prev" style="display: none;">
                                    <i class="bi bi-arrow-left me-2"></i>Previous
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-4 btn-next">
                                    Next<i class="bi bi-arrow-right ms-2"></i>
                                </button>
                                <button type="submit" class="btn btn-success btn-lg px-4 btn-submit" style="display: none;">
                                    Create Bounty<i class="bi bi-check-lg ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- include footer.php -->
     <?php include 'partials/footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Progress steps handling
            const form = document.getElementById('createBountyForm');
            const steps = form.querySelectorAll('.form-step');
            const progressSteps = document.querySelectorAll('.progress-steps .step');
            const prevBtn = form.querySelector('.btn-prev');
            const nextBtn = form.querySelector('.btn-next');
            const submitBtn = form.querySelector('.btn-submit');
            let currentStep = 1;

            function updateStep(newStep) {
                steps.forEach(step => step.classList.remove('active'));
                progressSteps.forEach((step, index) => {
                    step.classList.remove('active');
                    if (index + 1 < newStep) {
                        step.classList.add('completed');
                        step.querySelector('.step-icon').innerHTML = '<i class="bi bi-check-lg"></i>';
                    } else {
                        step.classList.remove('completed');
                        step.querySelector('.step-icon').innerHTML = `<i class="bi bi-${index + 1}-circle${index + 1 === newStep ? '-fill' : ''}"></i>`;
                    }
                });

                form.querySelector(`[data-step="${newStep}"]`).classList.add('active');
                progressSteps[newStep - 1].classList.add('active');

                prevBtn.style.display = newStep === 1 ? 'none' : 'inline-flex';
                nextBtn.style.display = newStep === 4 ? 'none' : 'inline-flex';
                submitBtn.style.display = newStep === 4 ? 'inline-flex' : 'none';

                currentStep = newStep;
            }

            // Category other option handling
            const categorySelect = document.getElementById('categorySelect');
            const otherCategoryInput = document.getElementById('otherCategoryInput');

            categorySelect.addEventListener('change', function() {
                otherCategoryInput.style.display = this.value === 'other' ? 'block' : 'none';
            });

            // Tags input handling
            const tagInput = document.getElementById('tagInput');
            const tagSuggestions = document.querySelector('.tag-suggestions');
            const selectedTags = document.querySelector('.selected-tags');

            const tagsList = [
                'JavaScript', 'Python', 'Java', 'Solidity', 'React', 'Node.js', 'Angular', 'Vue.js',
                'Blockchain', 'Smart Contracts', 'DeFi', 'NFT', 'Web3', 'Security', 'Frontend', 'Backend'
            ];

            tagInput.addEventListener('input', function() {
                const value = this.value.toLowerCase();
                if (value) {
                    const filteredTags = tagsList.filter(tag => 
                        tag.toLowerCase().includes(value) && 
                        !Array.from(selectedTags.children).some(child => 
                            child.textContent.replace('×', '').trim().toLowerCase() === tag.toLowerCase()
                        )
                    );
                    
                    if (filteredTags.length > 0) {
                        tagSuggestions.innerHTML = filteredTags
                            .map(tag => `<div class="tag-suggestion-item">${tag}</div>`)
                            .join('');
                        tagSuggestions.style.display = 'block';
                    } else {
                        tagSuggestions.style.display = 'none';
                    }
                } else {
                    tagSuggestions.style.display = 'none';
                }
            });

            tagSuggestions.addEventListener('click', function(e) {
                if (e.target.classList.contains('tag-suggestion-item')) {
                    const tag = e.target.textContent;
                    addTag(tag);
                    tagInput.value = '';
                    tagSuggestions.style.display = 'none';
                }
            });

            function addTag(tag) {
                const tagElement = document.createElement('span');
                tagElement.className = 'badge bg-primary me-2 mb-2';
                tagElement.innerHTML = `${tag} <i class="bi bi-x-lg ms-1" style="cursor: pointer;"></i>`;
                tagElement.querySelector('i').addEventListener('click', function() {
                    tagElement.remove();
                });
                selectedTags.appendChild(tagElement);
            }

            // Skills input handling
            const skillInput = document.getElementById('skillInput');
            const skillSuggestions = document.querySelector('.skill-suggestions');
            const selectedSkills = document.querySelector('.selected-skills');

            const skillsList = [
                'JavaScript', 'Python', 'Java', 'Solidity', 'React', 'Node.js', 'Angular', 'Vue.js',
                'Blockchain', 'Smart Contracts', 'DeFi', 'NFT', 'Web3', 'Security', 'Frontend', 'Backend',
                'TypeScript', 'Go', 'Rust', 'C++', 'AWS', 'Docker', 'Kubernetes', 'GraphQL'
            ];

            skillInput.addEventListener('input', function() {
                const value = this.value.toLowerCase();
                if (value) {
                    const filteredSkills = skillsList.filter(skill => 
                        skill.toLowerCase().includes(value) && 
                        !Array.from(selectedSkills.children).some(child => 
                            child.textContent.replace('×', '').trim().toLowerCase() === skill.toLowerCase()
                        )
                    );
                    
                    if (filteredSkills.length > 0) {
                        skillSuggestions.innerHTML = filteredSkills
                            .map(skill => `<div class="tag-suggestion-item">${skill}</div>`)
                            .join('');
                        skillSuggestions.style.display = 'block';
                    } else {
                        skillSuggestions.style.display = 'none';
                    }
                } else {
                    skillSuggestions.style.display = 'none';
                }
            });

            skillSuggestions.addEventListener('click', function(e) {
                if (e.target.classList.contains('tag-suggestion-item')) {
                    const skill = e.target.textContent;
                    addSkill(skill);
                    skillInput.value = '';
                    skillSuggestions.style.display = 'none';
                }
            });

            function addSkill(skill) {
                const skillElement = document.createElement('span');
                skillElement.className = 'badge bg-primary me-2 mb-2';
                skillElement.innerHTML = `${skill} <i class="bi bi-x-lg ms-1" style="cursor: pointer;"></i>`; javascript
                skillElement.querySelector('i').addEventListener('click', function() {
                    skillElement.remove();
                });
                selectedSkills.appendChild(skillElement);
            }

            // Winner distribution handling
            const singleWinner = document.getElementById('singleWinner');
            const multipleWinners = document.getElementById('multipleWinners');
            const winnerDistribution = document.getElementById('winnerDistribution');
            const totalReward = document.getElementById('totalReward');
            const percentageInputs = document.querySelectorAll('.winner-percentage input');
            const winnerAmounts = document.querySelectorAll('.winner-amount');
            const totalPercentageElement = document.querySelector('.total-percentage');

            function updateWinnerAmounts() {
                const total = parseFloat(totalReward.value) || 0;
                let totalPercentage = 0;

                percentageInputs.forEach((input, index) => {
                    const percentage = parseFloat(input.value) || 0;
                    totalPercentage += percentage;
                    const amount = (total * percentage) / 100;
                    winnerAmounts[index].textContent = `₹${amount.toFixed(2)}`;
                });

                totalPercentageElement.textContent = `${totalPercentage}%`;
                totalPercentageElement.style.color = totalPercentage === 95 ? '#198754' : '#dc3545';
            }

            singleWinner.addEventListener('change', function() {
                winnerDistribution.style.display = 'none';
            });

            multipleWinners.addEventListener('change', function() {
                winnerDistribution.style.display = 'block';
            });

            totalReward.addEventListener('input', updateWinnerAmounts);
            percentageInputs.forEach(input => {
                input.addEventListener('input', updateWinnerAmounts);
            });

            // Payment method selection
            const paymentMethods = document.querySelectorAll('.payment-method-card');
            paymentMethods.forEach(method => {
                method.addEventListener('click', function() {
                    paymentMethods.forEach(m => m.classList.remove('active'));
                    this.classList.add('active');
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });

            // File upload handling
            const fileUpload = document.querySelector('.file-upload-area');
            const fileInput = document.querySelector('.file-upload-container input[type="file"]');

            if (fileUpload && fileInput) {
                fileUpload.addEventListener('click', () => fileInput.click());
                
                fileUpload.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    fileUpload.classList.add('dragover');
                });

                fileUpload.addEventListener('dragleave', () => {
                    fileUpload.classList.remove('dragover');
                });

                fileUpload.addEventListener('drop', (e) => {
                    e.preventDefault();
                    fileUpload.classList.remove('dragover');
                    fileInput.files = e.dataTransfer.files;
                    updateFileList();
                });

                fileInput.addEventListener('change', updateFileList);
            }

            function updateFileList() {
                const files = fileInput.files;
                const fileList = document.createElement('div');
                fileList.className = 'selected-files mt-3';
                
                Array.from(files).forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item d-flex align-items-center mb-2';
                    fileItem.innerHTML = `
                        <i class="bi bi-file-earmark me-2"></i>
                        <span class="flex-grow-1">${file.name}</span>
                        <span class="text-muted small">${(file.size / 1024).toFixed(1)} KB</span>
                        <button type="button" class="btn btn-link text-danger p-0 ms-2">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    `;
                    fileList.appendChild(fileItem);
                });

                const existingFileList = fileUpload.parentElement.querySelector('.selected-files');
                if (existingFileList) {
                    existingFileList.remove();
                }
                fileUpload.parentElement.appendChild(fileList);
            }

            // Navigation buttons
            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    updateStep(currentStep - 1);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentStep < 4) {
                    updateStep(currentStep + 1);
                }
            });

            // Form submission
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                // Add form submission logic here
                console.log('Form submitted');
            });

            // Initialize datepicker min dates
            const startDate = document.querySelector('input[type="date"]');
            const endDate = document.querySelectorAll('input[type="date"]')[1];
            
            const today = new Date().toISOString().split('T')[0];
            startDate.min = today;
            startDate.addEventListener('change', function() {
                endDate.min = this.value;
            });
        });
    </script>
</body>
</html>
