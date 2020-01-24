<?php require_once(ROOT."/view/header.php"); ?>
<div class="wrap">
    <div class="header">
        <div class="cart-btn">Cart (<span class="cart-btn__count">0</span>)</div>
    </div>
    <div class="products">
        <?php foreach($products as $value){ ?>
        <div class="product">
            <div class="product__name"><?=$value[6];?></div>
            <div class="product__sku"><?=$value[8];?></div>
            <div class="product__description"><?=$value[9];?></div>
            <div class="product__price">$<?=$value[10];?></div>
            <button data-product-id="<?=$value['id'];?>" class="product__add-to-cart">Add to cart</button>
        </div>
        <?php } ?>
    </div>
</div>
<?php require_once(ROOT."/view/footer.php"); ?>