<?php
    require '_functions.php';

    if (isset($_POST['fruitSearch'])) {

        $fruitSearch = $_POST['fruitSearch'];
      
        // check if the search is empty
        if (empty($fruitSearch)) {
            header("Location:index.php?note=invalid");
        } else {
            header("Location:fruit_search.php?searchText=$fruitSearch");
        }

    } else {
        header("Location:index.php?note=invalid");
    }
?>
