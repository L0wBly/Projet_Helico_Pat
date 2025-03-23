<?php

if(isset($_FILES['file'])) {
    $input = $_FILES['file']['tmp_name'];  
    $fileName = $_FILES['file']['name'];   
    $output = 'archive.zip';               

    $zip = new ZipArchive;
    if ($zip->open($output, ZipArchive::CREATE) === TRUE) {
        $zip->addFile($input, $fileName);   
        $zip->close();
        echo "Fichier compressé avec succès: <a href='$output'>$output</a>";
    } else {
        echo "Erreur lors de la création du fichier ZIP.";
    }
}

?>