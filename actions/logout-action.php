<?php
    include '../classes/User.php';
    #instantiate an object
    $user = new User;

    #Call the logout method inside the user.php
    $user->logout();

?>