<?php
view('blocks/header');
$errors = $errors ?? [];
?>
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 mt-5 m-auto">
            <form method="post" action="<?= url('auth/signup') ?>">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input
                        type="email"
                        class="form-control"
                        id="floatingInput"
                        name="email"
                        placeholder="name@example.com"
                        value="<?= $fields['email'] ?? '' ?>"
                    />
                    <label for="floatingInput">Email address</label>
                    <?= showInputError('email', $errors) ?>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
                    <label for="pass">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="pass_confirm" name="password_confirm" placeholder="Confirm Password">
                    <label for="pass_confirm">Confirm password</label>
                </div>
                <?= showInputError('password', $errors) ?>

                <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
                <hr>
                <a class="btn btn-info w-100" href="<?= url('login') ?>">Sign In</a>
            </form>
        </main>
    </div>
<?php
view('blocks/footer');