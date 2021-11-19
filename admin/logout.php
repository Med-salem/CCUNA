
<?php
    session_start();//start the Session

    session_unset();// Unset The Data

    session_destroy();//Destroy the Session

    header('Location: index.php');
    //this.exit();
    exit();