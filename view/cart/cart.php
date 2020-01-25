<?php if($products){ ?>
    <?php foreach($products as $value){ ?>
        <div class="cart-product">
            <div class="cart-product__del" data-product-id="<?=$value['3'];?>">x</div>
            <div class="cart-product__name">Name: <?=$value[6];?></div>
            <div class="cart-product__sku">Sku: <?=$value[8];?></div>
            <div class="cart-product__description">Description: <?=$value[9];?></div>
            <div class="cart-product__quantity">Quantity: <?=$value['quantity'];?></div>
            <div class="cart-product__price">Price: $<?=$value[10];?></div>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="cart-product__empty">Empty</div>
<?php } ?>