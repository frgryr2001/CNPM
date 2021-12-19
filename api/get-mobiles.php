<?php

header("Access-Control-Allow-Origin: *");
//init json
$json = array();
//set the status
$json['status'] = true;
//create arr have 5 attribute
$data = array();
$data[] = array(
    'id' => 'product1',
    'name' => 'iPhone 11 Pro Max 512GB',
    'oldPrice' => 25000000,
    'description' => 'Tặng kèm một em người yêu siêu dễ thương',
    'rate' => 4.5,
    'price' => 23000000,
    'numberRate' => 12,
    'hotSale' => 1,
    'image' => 'assets/img/product/phone1.webp'
);
$data[] = array(
    'id' => 'product2',
    'name' => 'iPhone 12 Pro Max 512GB',
    'oldPrice' => 35000000,
    'description' => 'Tặng kèm một em người yêu siêu dễ thương',
    'rate' => 4.5,
    'price' => 33000000,
    'numberRate' => 172,
    'hotSale' => 0,
    'image' => 'assets/img/product/phone2.webp'
);
$data[] = array(
    'id' => 'product3',
    'name' => 'iPhone 13 Pro Max 512GB',
    'oldPrice' => 45000000,
    'description' => 'Tặng kèm một em người yêu siêu dễ thương',
    'rate' => 4.5,
    'price' => 43000000,
    'numberRate' => 132,
    'hotSale' => 0,
    'image' => 'assets/img/product/phone3.webp'
);
$data[] = array(
    'id' => 'product4',
    'name' => 'iPhone 13 Pro 512GB',
    'oldPrice' => 15000000,
    'description' => 'Tặng kèm một em người yêu siêu dễ thương',
    'rate' => 4.5,
    'price' => 13000000,
    'numberRate' => 122,
    'hotSale' => 1,
    'image' => 'assets/img/product/phone4.webp'
);
$json['data'] = $data;

echo json_encode($json);

?>