<?php
$uploadDir = 'uploads/';


if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}


if (isset($_FILES['file'])) {
    $fileName = basename($_FILES['file']['name']);
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        echo "✅ Le fichier a été téléchargé avec succès : <a href='$filePath' download>$fileName</a><br>";
    } else {
        echo "❌ Erreur lors du téléchargement du fichier.<br>";
    }
}


if (isset($_POST['delete'])) {
    $fileToDelete = $uploadDir . $_POST['delete'];

    if (file_exists($fileToDelete)) {
        if (unlink($fileToDelete)) {
            echo "✅ Fichier supprimé : " . htmlspecialchars($_POST['delete']);
        } else {
            echo "❌ Erreur lors de la suppression.";
        }
    } else {
        echo "⚠ Le fichier n'existe pas.";
    }
}


$files = array_diff(scandir($uploadDir), array('.', '..'));
?>