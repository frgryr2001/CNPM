function tinOrder(btn, status) {
    let tr = document.getElementById('tr_' + btn);
    tr.innerHTML = "";

    var formData = { id: btn, status: status };
    $.ajax({
        url: '../admin/api/order/orderHandle.php',
        type: 'POST',
        data: formData,
        success: function (res) {

        }
    });
}
function detailOrder(id) {
    let url = "../../api/order_detailAPI.php?id=" + id;
    $.get(url, function (data) {
        const data_new = JSON.parse(data).data;
        let total = 0;
        let html = data_new.map(e => {
            total += (e.inital_price * e.qty) - ((e.inital_price * e.qty) / e.sale_off);
            e.inital_price = e.inital_price - (e.inital_price / e.sale_off);
            return `<tr>
                        <th scope="row">
                            <img src="./assets/img/product/${e.image}" alt="">
                        </th>
                        <td style="vertical-align: middle;">${e.product_name}</td>
                        <td style="vertical-align: middle;">${new Intl.NumberFormat().format(e.inital_price)}VND</td>
                        <td style="vertical-align: middle;">${e.qty}</td>
                    </tr>
                    `
        });

        let html2 = ` <tr class="total">
                                    <th scope="row"></th>
                                    <td>Total</td>
                                    <td>${new Intl.NumberFormat().format(total)}VND</td>
                                    <td></td>
                        </tr>`
        html.push(html2)

        const orderDetail = document.getElementById('orderDetail');
        orderDetail.innerHTML = html.join("");




    })


}