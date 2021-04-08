<div class="item" id="<?php echo $item['id'] ?>">
    <img style="object-fit: cover" class="main-item-image" src="public/linksImages/<?php echo $item['img'] ?>" alt="">
    <div class="hover-container" id="<?php echo $item['link'] ?>">
        <img src="public/img/point.png" alt="">
        <p class="hover-title"><?php echo $item['name'] ?></p>
        <p class="delete-btn">X</p>
    </div>
</div>