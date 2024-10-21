<?php


declare (strict_types = 1);



function print_pre($array): void{
    echo "<pre>";
        print_r ($array);
    echo "</pre>";
}


function getTransactionFiles(string $dirPath): array {
    $files = [];

    foreach (scandir($dirPath) as $file){
        if(is_dir($file)) continue;
        $files[] = $dirPath . $file;
    }

    return $files;
}



function getTransactions(string $fileName): array {
    if(!file_exists($fileName)){
        trigger_error("This $fileName not found", E_USER_ERROR);
    }
}