<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>image upload</title>
        
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <form name="image_upload" id="upload" enctype="multipart/form-data" action="upload.php" method="post">
                <div id="message"></div>
                <progress id="progressbar" value="0" max="100" style="display:none"></progress>
                <p id="upload-bar"><input type="file" name="image" multiple accept="image/*">
                <input type="submit" name = 'send' value="Отправить"></p>
            </form>
        </main>
        <script src="jquery-1.9.0.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>

