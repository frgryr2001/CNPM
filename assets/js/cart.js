/*  */
'use strict'
/* validation */
window.addEventListener('load', () => {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, (form) => {
        form.addEventListener('submit', (event) => {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);

/* Giảm số lượng */
function reduce(li, id, price) {
    let ul = li.parentNode; /* ul */
    console.log(li);
    let priceTotal = document.getElementById('price-total');
    let defaultPrice = priceTotal.innerHTML;
    let li_qty = ul.childNodes[3];/* li.product_qty */
    let qty = parseInt(li_qty.innerHTML); /* value in li.product_qty */
    if (qty > 1) {
        li_qty.innerHTML = `${qty - 1}`;
    }
    var formData = { id: id, qty: `${qty - 1}` };
    $.ajax({
        url: '../api/updateQty.php',
        type: 'POST',
        data: formData,
        success: function (res) {
            priceTotal.innerHTML = Number(defaultPrice) - Number(price);

        }
    });
}

/* Thêm số lượng */
function add(li, id, price) {

    let priceTotal = document.getElementById('price-total');
    let defaultPrice = priceTotal.innerHTML;
    let ul = li.parentNode;
    let li_qty = ul.childNodes[3];
    let qty = parseInt(li_qty.innerHTML);
    li_qty.innerHTML = `${qty + 1}`;
    var formData = { id: id, qty: `${qty + 1}` };
    $.ajax({
        url: '../api/updateQty.php',
        type: 'POST',
        data: formData,
        success: function (res) {
            priceTotal.innerHTML = Number(defaultPrice) + Number(price);
        }

    });

}
