<?php
require 'views/components/header.php';
require 'views/components/navbar.php';
?>

<div class="form-container">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <h2 class="text-center mb-4">Register</h2>
        <form method="POST" action="/register">
            <div class="mb-3">
                <label for="registerName" class="form-label">Name</label>
                <input type="text" class="form-control" id="registerName" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Enter your password" required>
                    <span class="input-group-text" id="toggleRegisterPassword" style="cursor: pointer;">
                        <i class="fa fa-eye" id="registerPasswordIcon"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                        <i class="fa fa-eye" id="confirmPasswordIcon"></i>
                    </span>
                </div>
            </div>
            <div class="d-grid">
                <p class="text-danger text-center" style="display: block">
                    <?= $_SESSION['error'] ?? ''?>
                </p>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>
        <p class="text-center mt-3">
            Already have an account? <a href="/login">Login</a>
        </p>
    </div>

</div>

<script>
    document.getElementById('toggleRegisterPassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('registerPassword');
        const passwordIcon = document.getElementById('registerPasswordIcon');

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

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');

        // Toggle input type between 'password' and 'text'
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            confirmPasswordIcon.classList.remove('fa-eye');
            confirmPasswordIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = 'password';
            confirmPasswordIcon.classList.remove('fa-eye-slash');
            confirmPasswordIcon.classList.add('fa-eye');
        }
    });
</script>

<!-- Font Awesome Icon Library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<?php
require 'views/components/footer.php';
?>
