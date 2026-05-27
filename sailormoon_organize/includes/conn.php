<?php
    $server    = "localhost";
    $username  = "root";
    $password  = "";
    $dbname    = "sailormoon_db";

    // Main content tables
    $tablechar      = "characters";
    $tableability   = "character_abilities";
    $tablehighlight = "highlights";
    $tablemedia     = "gallery_media";
    $tablecontact   = "contact_messages";
    $tablenews      = "newsletter_subscribers";

    // Admin login table
    $tablelogin = "admin_users";

    $conn = mysqli_connect($server, $username, $password, $dbname)
        or die("Cannot connect to database.");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
