<?php
$title = 'Login';
require_once 'includes/header.php';

?>
<div class="container py-5 custom-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Connexion
                </div>
                <div class="card-body">
                    <?php if (!empty($userSession) &&  $userSession === 1) :
                        unset($_SESSION['Auth']);
                    ?>
                        <div class="alert alert-success" role="alert">
                            The connection succeeded
                        </div>
                    <?php elseif (!empty($userSession) && $userSession === 'false') : ?>
                        <div class="alert alert-danger" role="alert">
                            The connection failed
                        </div>
                    <?php endif;

                    ?>
                    <form action="/login/check" method="POST">
                        <div class="form-group mt-4">
                            <label for="username">Nom d'utilisateur (e-mail)</label>
                            <input type="text" class="form-control" id="username" name="email" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <button class="btn btn-outline-secondary btn-password" type="button" id="togglePassword">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Se connecter</button>
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