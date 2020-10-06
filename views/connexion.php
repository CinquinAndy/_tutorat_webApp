<div class="login-box">
    <h2>Connexion</h2>
    <form method="post" id="connect" action="">
        <div class="user-box">
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="pass" required>
            <label>Mot de passe</label>
        </div>
        <a onclick="document.getElementById('connect').submit()" type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Se connecter
        </a>
        <a href="/register">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Créer un compte
        </a>
    </form>
</div>


<?php
if (isset($_SESSION['retourUser'])) {
    retourUtilisateur($_SESSION['retourUser']);
}


if (!empty($_POST)) {
    $DB_PASS = hpost("http://localhost:4567/api/connect", array("email" => sanitize($_POST["email"])));
    if (password_verify($_POST["pass"], $DB_PASS->password)) {
        $_SESSION["me"] = $DB_PASS;
        header("Location: /");
        die();
    }
}
