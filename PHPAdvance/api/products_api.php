<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$filename = 'products.json';

function getProducts() {
    global $filename;
    if (!file_exists($filename)) {
        // Initialize with empty array if file does not exist
        file_put_contents($filename, json_encode([]));
    }
    $data = file_get_contents($filename);
    return json_decode($data, true);
}

function saveProducts($products) {
    global $filename;
    file_put_contents($filename, json_encode($products));
}

switch ($method) {
    case 'GET':
        // Read products
        $products = getProducts();
        echo json_encode($products);
        break;

    case 'POST':
        // Create a new product
        $input = json_decode(file_get_contents('php://input'), true);
        $products = getProducts();
        $input['id'] = end($products)['id'] + 1; // Auto-increment ID
        $products[] = $input;
        saveProducts($products);
        echo json_encode($input);
        break;

    case 'PUT':
        // Update an existing product
        $input = json_decode(file_get_contents('php://input'), true);
        $products = getProducts();
        foreach ($products as &$product) {
            if ($product['id'] == $input['id']) {
                $product = $input;
                break;
            }
        }
        saveProducts($products);
        echo json_encode($input);
        break;

    case 'DELETE':
        // Delete a product
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id'])) {
            $id = $input['id'];
            $products = getProducts();
            $products = array_filter($products, function($product) use ($id) {
                return $product['id'] != $id;
            });
            saveProducts($products);
            echo json_encode(['deleted' => $id]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID not provided']);
        }
        break;
    
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>
