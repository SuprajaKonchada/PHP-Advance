<?php
function performCurlRequest($url, $method, $data = null) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    return json_decode($response, true);
}

$apiUrl = "http://localhost/PHPAdvance/api/products_api.php";

// CREATE a new product
$newProduct = [
    "name" => "Smartwatch",
    "price" => 250
];
$response = performCurlRequest($apiUrl, 'POST', $newProduct);
echo "Created Product: ";
print_r($response);

// READ products
$response = performCurlRequest($apiUrl, 'GET');
echo "<h1>Product List:</h1><pre>";
print_r($response);
echo "</pre>";

// UPDATE a product
$updatedProduct = [
    "id" => 1,
    "name" => "Updated Laptop",
    "price" => 1300
];
$response = performCurlRequest($apiUrl, 'PUT', $updatedProduct);
echo "Updated Product: ";
print_r($response);

// DELETE a product
$productIdToDelete = [
    "id" => 4
];
$response = performCurlRequest($apiUrl, 'DELETE', $productIdToDelete);
echo "Deleted Product ID: ";
print_r($response);
?>
