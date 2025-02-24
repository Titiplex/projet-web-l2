<header class="w3-theme-d2 w3-cell-row">
    <div class="w3-cell w3-padding w3-cell-middle three-quarters"><h1><a class="clean-ref" href="https://pedago.univ-avignon.fr/~uapv2401251">LeBonTroqueur</a>
        </h1></div>
    <div class="w3-cell w3-padding w3-cell-middle one-quarter align-right">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="https://pedago.univ-avignon.fr/~uapv2401251/?page=logout" class="w3-button w3-red">Logout</a>
        <?php else: ?>
            <a href="https://pedago.univ-avignon.fr/~uapv2401251/?page=login" class="w3-button w3-theme">Login</a>
            <a href="https://pedago.univ-avignon.fr/~uapv2401251/?page=register" class="w3-button w3-theme">Sign Up</a>
        <?php endif; ?>
    </div>
</header>