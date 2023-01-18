<?php
    include "../classes/User.php";

    # Instantiate an object
    $user = new User;

    # Call the method
    $user->store($_POST);
?>