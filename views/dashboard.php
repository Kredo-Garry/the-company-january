<?php
  session_start();
  include '../classes/User.php';

  # Instantiate an object
  $user = new User;
  $all_users = $user->getAllUsers();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
     <title>Dashboard</title>
 </head>
 <body>
     
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="#" class="navbar-brand">
                <h2 class="h3">The Company</h2>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?=$_SESSION['fullname']?></span>
                <form action="../actions/logout-action.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">User List</h2>

            <table class="table table-hover table-striped align-middle">
                <thead>
                    <th>Photo/Avatar</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last  Name</th>
                    <th>Username</th>
                    <th>Action Buttons</th>
                </thead>
                <tbody>
                    <?php
                       while ($user = $all_users->fetch_assoc()) {
                    ?>
                          <tr>
                              <td>
                                  <?php
                                    if ($user['photo']) {
                                  ?>
                                    <img src="../assets/images/<?=$user['photo']?>" alt="<?=$user['photo']?>" class="d-block mx-auto dashboard-photo" style="width: 3rem; height: 3rem;">
                                  <?php
                                    }else {
                                  ?>
                                        <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                                  <?php
                                    }
                                  ?>
                              </td>
                              <td><?=$user['id']?></td>
                              <td><?=$user['first_name']?></td>
                              <td><?=$user['last_name']?></td>
                              <td><?=$user['username']?></td>
                              <td>
                                  <!-- Check if the id here is equal to the ID of the user who is loggedin -->
                                  <?php
                                    if ($_SESSION['id'] == $user['id']) {
                                  ?>
                                    <a href="../views/edit-user.php" class="btn btn-outline-warning" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="../views/delete-user.php" class="btn btn-outline-danger" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                  <?php
                                    }
                                  ?>
                              </td>
                          </tr>
                    <?php
                       }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Javascript Bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </body>
 </html>
