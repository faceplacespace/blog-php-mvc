<?php $this->layout('/front/front-template', ['title' => 'Login']) ?>

<div class="kotha-default-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Введите свои данные</h1>
                <?=flash()->display();?>
                <form action="/login/submit" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="login-links">
                    <p class="text-center">Еще нет аккаунта? <a class="txt-brand" href="/registration"><font color=#29aafe>Регистрируйся</font></a></p>
                </div>
            </div>
        </div>
    </div>
</div>