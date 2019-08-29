<?php

    require_once "../../models/pagosModel.php";

    
    $option = $_POST['option'];

    if($option == 'read'){

        fileCsv();
    }

    elseif ($option == 'upload') {
    
        uploadFiles();
    }

  


?>