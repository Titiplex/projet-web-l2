<?php if (isset($_SESSION['user_id'])) {
    header('Location: https://https://pedago.univ-avignon.fr/~uapv2401251/');
} ?>
<div class="w3-center">
    <h2>Login</h2>
</div>
<div class="w3-card w3-margin w3-center w3-round-large w3-padding">
    <form method="POST" action="">
        <label for="email">
            <p>Email</p>
            <input type="text" name="email" placeholder="example@example.com" required id="email" class="w3-input">
        </label>
        <label for="Username" class="w3-margin">
            <p>Username</p>
            <input type="text" name="Username" placeholder="example@example.com" required id="Username"
                   class="w3-input">
        </label>
        <label for="password" class="w3-margin">
            <p>Password</p>
            <input type="password" name="password" placeholder="Password" required id="password" class="w3-input">
        </label>
        <label for="password-confirmation" class="w3-margin">
            <p>Password Confirmation</p>
            <input type="password" name="password-confirmation" placeholder="Password confirmation" required
                   id="password-confirmation" class="w3-input">
        </label>
        <button type="submit" class="w3-btn w3-round w3-theme-dark w3-margin">Login</button>
    </form>
</div>