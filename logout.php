<?php
    session_start();
    include_once("php/autoload.php");
    session_destroy();

    // echo '
    //     <script>
    //         location.href = "./login.php";
    //     </script>
    // ';
    linkTo("./login.php");
