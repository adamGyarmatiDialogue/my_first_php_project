<div class="page">
    <div class="page-header">
        <div class="page-title">
            Regisztráció
        </div>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="app/services/users/sign-up.php">
                    <div class="mb-2">
                        <input type="text" placeholder="Vezetéknév: *" name="firstName" />
                    </div>

                    <div class="mb-2">
                        <input type="text" placeholder="Keresztnév: *" name="lastName" />
                    </div>

                    <div class="mb-2">
                        <input type="text" placeholder="Felhasználónév: *" name="username" />
                    </div>

                    <div class="mb-2">
                        <input type="text" placeholder="Email cím: *" name="email" />
                    </div>

                    <div class="mb-2">
                        <input type="password" placeholder="Jelszó: *" name="password" />
                    </div>

                    <div class="mb-2">
                        <input type="password" placeholder="Jelszó újra (megerősítés): *" name="reTypedPassword" />
                    </div>

                    <div class="mb-2">
                        <input type="checkbox" name="isAdmin" /> Regisztráció adminként
                    </div>

                    <?= Csrf::input(); ?>

                    <div>
                        <button type=" submit">Regisztráció</button>
                    </div>
                </form>
                <?php
                Session::showErrorMessage();
                Session::showSuccessMessage();
                ?>
            </div>
        </div>
    </div>
</div>