<?php
require 'views/components/header.php';
require 'views/components/navbar.php';
?>
<div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 10px; border: 2px solid rgba(0, 0, 0, 0.2); background-color: rgba(255, 255, 255, 0.9);">
    <div class="form-container">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST" action="/login">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fa fa-eye" id="passwordIcon"></i>
                    </span>
                </div>
            </div>
            <div class="d-grid">
                <p class="text-danger text-center" style="display: block">
                    <?= $_SESSION['error'] ?? ''?>
                </p>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="/register">Register</a>
        </p>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('loginPassword');
        const passwordIcon = document.getElementById('passwordIcon');

        // Toggle input type between 'password' and 'text'
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    });
</script>

<!-- Font Awesome Icon Library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<?php
require 'views/components/footer.php';
?>
