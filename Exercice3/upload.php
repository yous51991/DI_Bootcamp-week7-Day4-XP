<?php

// is post method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // uploaded process
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

        // extension allows
        $allowed = ["pdf" => "application/pdf"];

        // get infos file
        $filename = $_FILES['file']['name'];
        $filesize = $_FILES['file']['size'];
        $filetype = $_FILES['file']['type'];

        // get the extention of the file
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // check extension is correct
        if (!array_key_exists($ext, $allowed)) die("Error: the file format is not acceptable");

        //verifying the file size
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: file size too large!!");

        if (in_array($filetype, $allowed)) {
            if (file_exists("uploads/" . $filename)) {
                die("Sorry the file already exists");
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $filename);
                echo "File was uploaded successfully <br>";
            }
        } else {
            echo "Sorry a problem upload data!!";
        }
    } else {
        echo "Error: " . $_FILES['file']['error'];
    }
    
    // extra information describing the successfully uploaded file
    if ($_FILES['file']['error'] == 0) {
        echo "Filename: " . $_FILES['file']['name'] . "<br>";
        echo "Filetype :" . $_FILES['file']['type'] . "<br>";
        echo "Filesize: " . ($_FILES['file']['size'] / 1024) . "KB <br>";
    }
}
