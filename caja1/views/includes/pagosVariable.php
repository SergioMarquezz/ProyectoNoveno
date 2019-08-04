<?php

    require_once "../../models/pagosModel.php";

    
    $option = $_POST['option'];

    if($option == 'read'){

        $file_scv = $_POST['csv'];
        fileCsv($file_scv);
    }

    elseif ($option == 'upload') {
    
        uploadFiles();
    }

  


?>