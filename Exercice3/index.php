<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    
    <form accept="application/pdf" enctype="multipart/form-data" action="upload.php" method="post">
        <label for="fichier">Uploader votre fichier</label> <br/>
        <input type="file" name="file" id="file"> <br/>
        <input type="submit" value="valider">
    </form>

</body>
</html>