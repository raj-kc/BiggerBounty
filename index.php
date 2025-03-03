<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <title>Bigger Bounty - Find Your Next Opportunity</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

     <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

     <!-- include header.php -->

     <?php include 'partials/header.php'?>

     <!-- Hero Section -->
     <section class="hero-section">
          <div class="container">
               <div class="row align-items-center">
                    <div class="col-lg-6">
                         <h1 class="display-4 fw-bold mb-4 animate-up">Find Your Next
                              <span class="text-primary">Bounty</span> Opportunity
                         </h1>
                         <p class="lead mb-4 animate-up delay-1">Join thousands of developers earning rewards for their
                              skills</p>
                         <div class="search-box p-3 bg-white rounded-4 shadow animate-up delay-2">
                              <div class="row g-2">
                                   <div class="col-md-5">
                                        <div class="input-group">
                                             <span class="input-group-text bg-transparent border-0">
                                                  <i class="bi bi-search"></i>
                                             </span>
                                             <input type="text" class="form-control border-0"
                                                  placeholder="Search bounties...">
                                        </div>
                                   </div>
                                   <div class="col-md-5">
                                        <div class="input-group">
                                             <span class="input-group-text bg-transparent border-0">
                                                  <i class="bi bi-geo-alt"></i>
                                             </span>
                                             <select class="form-select border-0">
                                                  <option>All Categories</option>
                                                  <option>Smart Contracts</option>
                                                  <option>Frontend</option>
                                                  <option>Backend</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <button class="btn btn-primary w-100">Search</button>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                         <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80"
                              alt="Developers working" class="img-fluid rounded-4 animate-up delay-3">
                    </div>
               </div>
          </div>
     </section>


     <!-- Stats Section -->
     <section class="py-5 bg-light">
          <div class="container">
               <div class="row g-4 text-center">
                    <div class="col-md-3 col-6">
                         <div class="stat-card p-4 rounded-4 bg-white shadow-sm hover-lift">
                              <i class="bi bi-people-fill text-primary display-5 mb-3"></i>
                              <h3 class="fw-bold mb-2">10,000+</h3>
                              <p class="text-muted mb-0">Active Developers</p>
                         </div>
                    </div>
                    <div class="col-md-3 col-6">
                         <div class="stat-card p-4 rounded-4 bg-white shadow-sm hover-lift">
                              <i class="bi bi-briefcase-fill text-primary display-5 mb-3"></i>
                              <h3 class="fw-bold mb-2">5,000+</h3>
                              <p class="text-muted mb-0">Open Bounties</p>
                         </div>
                    </div>
                    <div class="col-md-3 col-6">
                         <div class="stat-card p-4 rounded-4 bg-white shadow-sm hover-lift">
                              <i class="bi bi-graph-up text-primary display-5 mb-3"></i>
                              <h3 class="fw-bold mb-2">$2M+</h3>
                              <p class="text-muted mb-0">Rewards Paid</p>
                         </div>
                    </div>
                    <div class="col-md-3 col-6">
                         <div class="stat-card p-4 rounded-4 bg-white shadow-sm hover-lift">
                              <i class="bi bi-trophy-fill text-primary display-5 mb-3"></i>
                              <h3 class="fw-bold mb-2">95%</h3>
                              <p class="text-muted mb-0">Success Rate</p>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     
<!-- Featured Bounties -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Featured Bounties</h2>
            <a href="#" class="btn btn-outline-primary">
                View All <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bounty-card border-0 shadow-sm hover-lift" >
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?auto=format&fit=crop&w=100&h=100&q=80" 
                                    alt="Company" class="rounded-3 me-2" width="50" height="50">
                                <p class="fw-bold mb-0">DeFi Protocol</p>
                                <p class="text-muted small mb-0">Smart Contract Audit</p>
                            </div>
                            <div class="reward-badge">
                                <i class="fas fa-trophy me-1"></i> $5,000
                            </div>
                        </div>
                        <p class="text-muted small mb-3" data-description="Review and analyze smart contracts to ensure security and reliability for DeFi protocols.">
                            Review and analyze smart contracts to ensure security and reliability for DeFi protocols.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-clock me-1"></i> 3 days left
                            </span>
                            <span class="text-muted small">
                                <i class="fas fa-users me-1"></i> 12 submissions
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bounty-card border-0 shadow-sm hover-lift" >
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=100&h=100&q=80" 
                                    alt="Company" class="rounded-3 me-2" width="50" height="50">
                                <p class="fw-bold mb-0">Tech Startup</p>
                                <p class="text-muted small mb-0">Frontend Development</p>
                            </div>
                            <div class="reward-badge">
                                <i class="fas fa-trophy me-1"></i> $3,000
                            </div>
                        </div>
                        <p class="text-muted small mb-3" data-description="Build a responsive and modern UI for a tech startup's web application.">
                            Build a responsive and modern UI for a tech startup's web application.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-clock me-1"></i> 5 days left
                            </span>
                            <span class="text-muted small">
                                <i class="fas fa-users me-1"></i> 8 submissions
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bounty-card border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=100&h=100&q=80" 
                                    alt="Company" class="rounded-3 me-2" width="50" height="50">
                                <p class="fw-bold mb-0">FinTech Company</p>
                                <p class="text-muted small mb-0">API Integration</p>
                            </div>
                            <div class="reward-badge">
                                <i class="fas fa-trophy me-1"></i> $4,000
                            </div>
                        </div>
                        <p class="text-muted small mb-3" data-description="Integrate multiple APIs to provide real-time data for a FinTech application.">
                            Integrate multiple APIs to provide real-time data for a FinTech application.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-clock me-1"></i> 7 days left
                            </span>
                            <span class="text-muted small">
                                <i class="fas fa-users me-1"></i> 15 submissions
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 

     <!-- Categories -->
     <section class="py-5 bg-light">
          <div class="container">
               <h2 class="fw-bold text-center mb-5">Popular Categories</h2>
               <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                         <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm hover-lift">
                              <i class="bi bi-code-slash text-primary display-5 mb-3"></i>
                              <h5 class="fw-bold mb-0">Development</h5>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                         <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm hover-lift">
                              <i class="bi bi-shield-check text-primary display-5 mb-3"></i>
                              <h5 class="fw-bold mb-0">Security</h5>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                         <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm hover-lift">
                              <i class="bi bi-phone text-primary display-5 mb-3"></i>
                              <h5 class="fw-bold mb-0">Mobile</h5>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                         <div class="category-card text-center p-4 bg-white rounded-4 shadow-sm hover-lift">
                              <i class="bi bi-boxes text-primary display-5 mb-3"></i>
                              <h5 class="fw-bold mb-0">Blockchain</h5>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <!-- CTA Section -->
     <section class="py-5">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                         <h2 class="display-6 fw-bold mb-4">Ready to Start Earning?</h2>
                         <p class="lead text-muted mb-4">Join thousands of developers earning rewards for their skills
                         </p>
                         <a href="#" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Get Started Now</a>
                    </div>
               </div>
          </div>
     </section>

     <!-- include footer.php -->
     <?php include 'partials/footer.php'?>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>