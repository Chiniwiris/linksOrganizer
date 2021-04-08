<?php $options = $this->d['allOptions']; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/create.css">
    <title>Modify</title>
</head>
<body>
<?php $this->showMessages(); ?>
<div class="go-to-home"><?php require 'views/links/header.php' ?></div>
<div id="create-link-container">
        <div id="form-container">
            <div id="form-left"></div>
            <div id="form-right">
                

                
                <h4>Edit

                <form action="#" method="post">
                    <select name="option" id="edit-select">
                    <option value="">Select an option</option>
                        <?php
                        require_once 'models/linkmodel.php';
                        foreach($options as $option){
                            $item = new linkModel();
                            $item->setId($option->getId());
                            $item->setName($option->getName());
                            $item->setImg($option->getImg());

                            ?>
                                <option value="<?php echo $item->getId(); ?>"><?php echo $item->getName(); ?></option>
                        <?php

                        }
                    ?>
                    </select>
                </form>

                Link</h4>

                
                <p>Dont't you have a link alreay? <a href="<?php echo constant('URL') ?>create">click here</a> to create it</p>
                <div id="form-container">
                    <form action="<?php echo constant('URL') ?>edit/updateLink" method="post" autocomplete="off" enctype="multipart/form-data">
                        <input class="id-input" type="hidden" name="id">
                        <label for="name">name:</label>
                        <input type="text" name="name" id="name-input" required=""><br>

                        <label for="link">link:</label>
                        <input type="text" name="link" id="link-input" required=""><br>

                        <input type="submit" value="Edit Link">
                    </form>

                    <form id="img-form" action="" method="post" enctype="multipart/form-data">
                    <label for="img">img:</label>
                        <input type="file" name="photo" id="img-input" required=""><br>
                        <input style="margin-top: 31px" id="image-btn" type="submit" value="Edit img">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL') ?>public/js/edit.js"></script>
</body>
</html>
<!-- 
$item = new LinkModel();
$item->setid($option->getId());
$item->setName($option->getName());
$item->setLink($option->getLink());
$item->setImg($option->getImg()); -->