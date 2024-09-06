<?php
// Database configuration
$host = 'localhost';
$db   = 'u225580968_freelancer';
$user = 'u225580968_freelancer';
$pass = 'Freelancer.uk.@2024';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Log the error message and return 500 Internal Server Error
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

if (isset($_GET['mainCategoryId'])) {
    $mainCategoryId = $_GET['mainCategoryId'];

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare('SELECT sub_cat_id, sub_cat_name FROM ql_catagory_sub WHERE main_cat_id = :mainCategoryId ORDER BY cat_order ASC');
        $stmt->execute(['mainCategoryId' => $mainCategoryId]);

        // Fetch the results
        $subcategories = $stmt->fetchAll();

        // Print the subcategories for debugging
       
        // Return subcategories as JSON response
        header('Content-Type: application/json');
        echo json_encode($subcategories);
        exit;
    } catch (Exception $e) {
        // Log detailed error message to server logs
        error_log('Error fetching subcategories: ' . $e->getMessage());

        // Return 500 Internal Server Error with error message
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch subcategories']);
        exit;
    }
} else {
    // Return 400 Bad Request if mainCategoryId parameter is missing
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}
?>
