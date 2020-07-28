<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'a';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'terupload/' . $_FILES['file']['name']);
        echo 'terupload/' . $_FILES['file']['name'];
    }

?>