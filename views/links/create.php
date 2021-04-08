<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/create.css">
    <title>Create</title>
</head>
<body>
<?php $this->showMessages(); ?>
    <div class="go-to-home"><?php require 'views/links/header.php' ?></div>
<div id="create-link-container">
        <div id="form-container">
            <div id="form-left"></div>
            <div id="form-right">
                <h4>insert new Link</h4>
                <p>Do you have a link alreay? <a href="<?php echo constant('URL') ?>edit">click here</a> to modify it</p>
                <div id="form-container">
                    <form action="<?php echo constant('URL') ?>create/newLink" method="post" enctype="multipart/form-data">
                        <label for="name">name:</label>
                        <input type="text" name="name" id="name-input" required=""><br>

                        <label for="link">link:</label>
                        <input type="text" name="link" id="link-input" required=""><br>

                        <label for="img">img:</label>
                        <input type="hidden" name="photo" id="photo" required="">
                        <input type="file" name="img" id="img-input" required=""><br>

                        <input type="submit" value="Insert new Link">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL') ?>public/js/create.js"></script>
</body>
</html>