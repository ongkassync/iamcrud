<?php
    require '_functions.php';

    if(isset($_POST['createFruit'])){

        $fruitName = $_POST['fruitName'];
        $fruitQty = $_POST['fruitQty'];

        $request = createFruit($fruitName,$fruitQty);

        if($request==true){
            header("Location:index.php?note=added");
        }else{
            header("Location:index.php?note=error");
        }

    }else{
        header("Location:index.php?note=invalid");
    }   
?>