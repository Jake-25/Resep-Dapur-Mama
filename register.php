<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="register-container">
        <h1>Registrasi Akun</h1>

        <form action="../controllers/registerController.php" method="post">
            <label for="newEmail">Email:</label>
            <input type="text" id="newEmail" name="newEmail" required>

            <label for="newUsername">Username:</label>
            <input type="text" id="newUsername" name="newUsername" required>

            <label for="newPassword">Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Daftar</button>
        </form>

        <h2>Sudah punya akun? <a href="../login.php">Login</a>.</h2>
    </div>
</body>
</html>
