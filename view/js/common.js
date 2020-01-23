; (function () {
    document.addEventListener("click", function (e) {
        let id = e.target.getAttribute("data-product-id");
        if (e.target.classList.contains('product__add-to-cart')) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "/index.php/?r=cart/addToCart&id=" + id);
            xhr.send();

            xhr.onload = function () {
                if (xhr.status != 200) {
                    alert(`error ${xhr.status}: ${xhr.statusText}`);
                } 
            };

            xhr.onerror = function () {
                alert("error");
            };
        }
    });
})();