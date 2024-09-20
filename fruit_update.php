<?php
    require '_functions.php';

    $fruitId = $_GET['fruitId'];

    if(isset($_POST['updateFruit'])){

        $fruitName = $_POST['fruitName'];
        $fruitQty = $_POST['fruitQty'];

        $request = updateFruit($fruitName, $fruitQty, $fruitId);

        if($request==true){
            header("Location:index.php?note=added");
        }else{
            header("Location:index.php?note=error");
        }

    }else{
        header("Location:index.php?note=invalid");
    }   
?>