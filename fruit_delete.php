<?php
    require '_functions.php';

    $fruitId = $_GET['fruitId'];

    if (isset($_POST['deleteFruit'])) {
        $request = deleteFruit($fruitId); // Assuming deleteFruit is defined in _functions.php

        if ($request == true) {
            header("Location:index.php?note=delete");
        } else {
            header("Location:index.php?note=error");
        }
    } else {
        header("Location:index.php?note=invalid");
    }
?>
