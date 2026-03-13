<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Mart | Admin Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-wrapper">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        
        <div class="container">
            <div class="hero-section">
                <div class="badge">v2.0 Enterprise</div>
                <h1>Quick Mart<span>.</span></h1>
                <p>The unified ecosystem for modern commerce. Manage global retail operations with real-time intelligence.</p>
                
                <div class="features">
                    <div class="feat-item"><i class="fa-solid fa-shield-check"></i> Multi-layer Security</div>
                    <div class="feat-item"><i class="fa-solid fa-chart-network"></i> Global Analytics</div>
                </div>
            </div>

            <div class="login-card">
                <div class="card-header">
                    <h2>Sign in</h2>
                    <p>Enter your credentials to access the portal</p>
                </div>

                <div id="msgDiv" class="alert-container" style="display: none;">
                    <div class="danger-alert" id="msg"></div>
                </div>

                <form onsubmit="event.preventDefault(); adminSignIn();">
                    <div class="input-group">
                        <label for="un">Username or Email</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" placeholder="name@company.com" id="un" required>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <div class="label-row">
                            <label for="pw">Password</label>
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-lock"></i>
                            <input type="password" placeholder="••••••••" id="pw" required>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>Access Dashboard</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
                
                <div class="card-footer">
                    <p>Protected by Enterprise-grade Encryption</p>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/script.js"></script>
</body>
</html>