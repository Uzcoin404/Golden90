<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form class="bg-light rounded p-4 p-sm-5 my-4 mx-3" action="/src/components/login.php" method="POST">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <a href="#">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <?php if (!empty($_GET['/admin/err'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                Email or password is wrong
                            </div>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>