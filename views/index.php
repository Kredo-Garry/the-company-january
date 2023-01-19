<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <form action="../actions/login-action.php" method="post">
                        
                        <input type="text" name="username" id="username" class="form-control fw-bold mb-2" placeholder="USERNAME" required autofocus>

                        <input type="password" name="password" id="password" class="form-control fw-bold mb-5" placeholder="PASSWORD" required>
                        
                        <button type="submit" class="form-control btn btn-primary text-white">Login</button>
                    </form>

                    <p class="text-muted text-center mt-3 small"> <a href="register.php">Create Account</a></p>
                    <!-- Make some changes -->
                    <p class="text-center text-muted mt-2 small">Copyright @ Kredo 2022</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Javascript Bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>