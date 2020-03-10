<?php
require_once 'include/autoload.php';

$data = CallAPI('GET', $customer_url, 'get_all_customers');
$status = checkSuccessOrFailure($data);
if ($status != false) {
    $customers = $data->{'customers'};
} else {
    $customers = false;
}

$path_info = 'product' . $_SERVER['PATH_INFO'];
$product_data = CallAPI('GET', $product_url, $path_info);
$product_status = checkSuccessOrFailure($product_data);
if ($product_data != false) {
    $product = $product_data->{'product'};
} else {
    $product = false;
}

?>

<?php
require_once 'template/head.php';
require_once 'template/header.php';



$product = [
    "category_id" => 1,
    "description" => "Force the sneaker community to respect you and grab the Air Force 1 Low White '07. This AF 1 Low comes with a white upper, white Nike \"Swoosh\", white midsole, and a white sole. These sneakers released in January 2018 and retailed for $90. Buy these classic sneakers today on Python Shoes.",
    "id" => 2,
    "image" => "nike-001.jpg",
    "name" => "Nike Air Force 1 Low",
    "quantity" => 10,
    "unit_price" => 75
            ];

$product_table = $product_data;
         
?>

<main role="main" class="container">
    <div class="starter-template">
        <p class="lead">
        <?php
        var_dump($product_table);
        ?>
        </p>
        <?php
        // var_dump($customers);

        // foreach ($customers as $customer) {
        //     echo "this is the emails " . $customer->{'email'} . "<br>";
        // }
        ?>
    </div>
</main>
<?php
require_once 'template/footer.php';
?>