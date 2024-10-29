<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="frm" method="post" enctype="multipart/form-data">
        <input type="file" name="ff">
        <input type="submit" value="ff" name="ok" value="Upload">

    </form>
    <?php
    // $_FILES[];
    // file_name;
    // file_type;
    // file_size;
    // tmp_name;
    // errors=0;

    move_uploaded_file('source path','destination');
     ?>
</body>
</html>