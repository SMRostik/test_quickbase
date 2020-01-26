<?php require_once(ROOT."/view/header.php"); ?>

    <div class="products">
        <?php foreach($products as $value){ ?>
        <div class="product">
            <a class="product__image-wrap" href="index.php?r=product/product&id=<?=$value[3];?>">
                <img class="product__image" src="<?=$value['imgUrl'];?>" alt="">
            </a>
            <a class="product__name" href="index.php?r=product/product&id=<?=$value[3];?>"><?=$value[6];?></a>
            <div class="product__sku"><?=$value[8];?></div>
            <div class="product__description"><?=$value[9];?></div>
            <div class="product__price">$<?=$value[10];?></div>
            <button data-product-id="<?=$value['3'];?>" class="product__add-to-cart">Add to cart</button>
        </div>
        <?php } ?>
        
    </div>

<?php require_once(ROOT."/view/footer.php"); ?>