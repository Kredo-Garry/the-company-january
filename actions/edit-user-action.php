<?php
    include '../classes/User.php';

    #Instantiate an object
    $user = new User;

    # Call the method
    $user->update($_POST, $_FILES);

?>