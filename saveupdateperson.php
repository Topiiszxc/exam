<?php 
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPassword = ""; 
$dbName = "exam"; 

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $first_Name = $_POST['firstName'];
    $middle_Name = $_POST['middleName'];
    $last_Name = $_POST['lastName'];
    $region = $_POST['region'];
    $contactAddress = $_POST['contactAddress'];
    $sql = "UPDATE person SET firstName = ?, middleName = ?, lastName = ?, region = ?, contactAddress = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $first_Name, $middle_Name, $last_Name, $region, $contactAddress, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); 
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
    

?>
