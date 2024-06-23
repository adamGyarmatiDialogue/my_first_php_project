<div class="page">
    <div class="page-header">
        <div class="page-title">
            Belépés
        </div>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="app/services/users/sign-in.php" method="POST">
                    <div class="mb-2">
                        <input type="text" name="email" placeholder="Email cím vagy felhasználónév: *" />
                    </div>

                    <div class="mb-2">
                        <input type="password" name="password" placeholder="Jelszó: *" />
                    </div>

                    <div class="mb-2">
                        <input type="checkbox" name="isAdmin" /> Belépés adminként
                    </div>

                    <?= Csrf::input(); ?>

                    <div>
                        <button type="submit">Belépés</button>
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