<?php
view('blocks/header');
?>
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 mt-5 m-auto">
            <form method="post" action="<?= url('auth/verify') ?>">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                           placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                           placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </form>
        </main>
    </div>
<?php
view('blocks/footer');