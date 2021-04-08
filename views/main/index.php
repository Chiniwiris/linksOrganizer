<?php include_once 'models/mainmodel.php'; 
    $mainModel = new MainModel(4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&family=Roboto:ital,wght@1,100&family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/main.css">
    <title>cinnamon</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li id="add-btn"><a href="<?php echo constant('URL') ?>create"><i class="material-icons">add</i></a></li>
            </ul>   
        </nav>
        <?php $this->showMessages(); ?>
        <h2 id="title">LinksManager</h2>
    </header>
    <main>
        <h3>tus links aparecerán aqui: </h3>
        <div class="items-container">
            <!-- aqui van los links-item -->
            <?php $mainModel->mostrarLinks(); ?>
        </div>
        <div class="page-btn-container">
                <!-- aqui van los pages-item -->
                <?php  $mainModel->mostrarPaginas();  ?>
            
        </div>
    </main>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL') ?>public/js/home.js"></script>
</body>
</html>