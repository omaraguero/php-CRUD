<?php
    define("HOSTNAME", "192.168.1.207");
    define("USERNAME", "OMAR");
    define("PASSWORD", "dbEve1");
    define("DATABASE","school_page");

    $connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

    if(!$connection){
        die("Connection Failed");
    }

?>