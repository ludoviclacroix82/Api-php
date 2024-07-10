<?php
$title = 'register';
require_once 'includes/header.php';

// Récupération des valeurs des sessions s'il y en a
$userSession = isset($_SESSION['registerFaill']['user']) ? $_SESSION['registerFaill']['user'] : '';
$emailSession = isset($_SESSION['registerFaill']['email']) ? $_SESSION['registerFaill']['email'] : '';
$pwdSession = isset($_SESSION['registerFaill']['pwd']) ? $_SESSION['registerFaill']['pwd'] : '';

$user = isset($_SESSION['registerValue']['user']) ? $_SESSION['registerValue']['user'] : '';
$email = isset($_SESSION['registerValue']['email']) ? $_SESSION['registerValue']['email'] : '';

$userAdd = isset($_SESSION['user']);

?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Formulaire d'inscription
                </div>
                <div class="card-body">

                    <form action="register/add" method="POST">
                        <?php if (!empty($userSession) || !empty($emailSession) || !empty($pwdSession)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?= (!empty($userSession)) ? "<li>{$userSession}</li>" : ''; ?>
                                    <?= (!empty($emailSession)) ? "<li>{$emailSession}</li>" : ''; ?>
                                    <?= (!empty($pwdSession)) ? "<li>{$pwdSession}</li>" : ''; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($userAdd)) : ?>
                            <div class="alert alert-success" role="alert">Utilisateur créé.
                                <a href="/login">Connectez-vous ici</a>
                            </div>
                            <?php unset($_SESSION['user']); ?>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Login user)</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <button class="btn btn-outline-secondary btn-password" type="button" id="togglePassword">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                <button class="btn btn-outline-secondary btn-password" type="button" id="toggleConfirmPassword">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Champ honeypot (anti-spam) -->
                        <div class="form-group d-none">
                            <label for="honeypot">Ne pas remplir ce champ</label>
                            <input type="text" class="form-control" id="honeypot" name="honeypot">
                        </div>
                        <!-- Bouton de soumission -->
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer src="/assets/js/passwordToogle.js"></script>

<?php
require_once 'includes/footer.php';
?>