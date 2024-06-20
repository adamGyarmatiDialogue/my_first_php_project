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
                    <div>
                        <input type="text" placeholder="Vezetéknév: *" name="firstName" />
                    </div>

                    <div>
                        <input type="text" placeholder="Keresztnév: *" name="lastName" />
                    </div>

                    <div>
                        <input type="text" placeholder="Felhasználónév: *" name="username" />
                    </div>

                    <div>
                        <input type="text" placeholder="Email cím: *" name="email" />
                    </div>

                    <div>
                        <input type="password" placeholder="Jelszó: *" name="password" />
                    </div>

                    <div>
                        <input type="password" placeholder="Jelszó újra (megerősítés): *" name="reTypedPassword" />
                    </div>

                    <div>
                        <input type="checkbox" name="isAdmin" /> Regisztráció adminként
                    </div>

                    <div>
                        <button type="submit">Regisztráció</button>
                    </div>
                </form>
                <?php
                if (isset($_SESSION['errorMessage'])) {
                    echo "<div>" . $_SESSION['errorMessage'] . "</div>";
                    unset($_SESSION['errorMessage']);
                }
                ?>
            </div>
        </div>
    </div>
</div>