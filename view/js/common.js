; (function () {
    let cart = {
        addToCart: function(id){
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "/index.php/?r=cart/addToCart&id=" + id);
            xhr.send();

            xhr.onload = function () {
                if (xhr.status != 200) {
                    alert(`error ${xhr.status}: ${xhr.statusText}`);
                } else {
                    document.querySelector(".cart-btn__count").innerHTML = xhr.response;
                }
            };

            xhr.onerror = function () {
                alert("error");
            };
        },
        del: function(id){
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "/index.php/?r=cart/delProductFromCart&id=" + id);
            xhr.send();

            xhr.onload = function () {
                if (xhr.status != 200) {
                    alert(`error ${xhr.status}: ${xhr.statusText}`);
                }
            };

            xhr.onerror = function () {
                alert("error");
            };
        },
        getCart: function(){
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "/index.php/?r=cart/getCart");
            xhr.send();

            xhr.onload = function () {
                if (xhr.status != 200) {
                    alert(`error ${xhr.status}: ${xhr.statusText}`);
                } else {
                    document.querySelector(".cart-btn__body").innerHTML = xhr.response;
                }
            };

            xhr.onerror = function () {
                alert("error");
            };
        },
        updateCount: function(){
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "/index.php/?r=cart/getCount");
            xhr.send();

            xhr.onload = function () {
                if (xhr.status != 200) {
                    alert(`error ${xhr.status}: ${xhr.statusText}`);
                } else {
                    document.querySelector(".cart-btn__count").innerHTML = xhr.response;
                }
            };

            xhr.onerror = function () {
                alert("error");
            };
        }
    };

    document.addEventListener("click", function (e) {
        let id = e.target.getAttribute("data-product-id");
        if (e.target.classList.contains('product__add-to-cart')) {
            cart.addToCart(id);
        }
        if (e.target.classList.contains('cart-product__del')) {
            cart.del(id);
            e.target.parentElement.remove();
            cart.updateCount();
        }
        if(!(e.target.classList.contains('cart-btn__body') || e.target.classList.contains('cart-btn'))){
            document.querySelector(".cart-btn__body").classList.remove("cart-btn__body_active");
        }
    }, true);

    document.querySelector(".cart-btn").addEventListener("click", function(e){
        if(!e.target.classList.contains('cart-btn__body')){
            this.querySelector(".cart-btn__body").classList.toggle("cart-btn__body_active");
        }
        if(!e.target.classList.contains('cart-product__del')){
            cart.getCart();
        }
    });

    cart.updateCount();
    
})();