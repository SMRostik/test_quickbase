<?php require_once(ROOT."/view/header.php"); ?>

    <div class="products">
        <div class="product product__single">
            <div class="product__name"><?=$product[6];?></div>
            <div class="product__sku"><?=$product[8];?></div>
            <div class="product__description"><?=$product[9];?></div>
            <div class="product__price">$<?=$product[10];?></div>
            <button data-product-id="<?=$product['3'];?>" class="product__add-to-cart">Add to cart</button>
        </div>
    </div>

<?php require_once(ROOT."/view/footer.php"); ?>