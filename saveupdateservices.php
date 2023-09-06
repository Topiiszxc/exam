<?php 
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPassword = ""; 
$dbName = "exam"; 
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $services_name = $_POST['services_name'];
    $services_date = $_POST['services_date'];
    $services_client = $_POST['services_client'];
    $sql = "UPDATE services SET services_name = ?, services_date = ?, services_client = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $services_name, $services_date, $services_client, $id);
    if ($stmt->execute()) {
        header("Location: services.php"); 
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
