<?php 
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPassword = ""; 
$dbName = "exam"; 
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
$sql = "SELECT * FROM person";
$result = $conn->query($sql);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
    <style>
body, ul {
    margin: 0;
    padding: 0;
}
table{
    width: 100%;
}
.btn-edit,
.btn-delete {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 5px;
}
.btn-delete {
    background-color: #ff3333;
}
.btn-edit:hover,
.btn-delete:hover {
    background-color: #0056b3;
}
td button {
    display: inline-block;
}
td {
    text-align: center;
    vertical-align: middle;
}
th,tr,td{
    border: 1px solid;
}
.navbar {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}
.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo {
    text-decoration: none;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
}
.nav-links {
    list-style: none;
    display: flex;
}
.nav-links li {
    margin-right: 20px;
}
.nav-links a {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
}
.nav-links a:hover {
    color: #ff6f61;
}
.content {
    text-align: center;
    padding: 40px;
}
@media screen and (max-width: 768px) {
    .container {
        flex-direction: column;
        align-items: flex-start;
    }
    .nav-links {
        margin-top: 10px;
    }
    .nav-links li {
        margin-right: 0;
        margin-bottom: 10px;
    }
    .styled-table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
}
.styled-table th,
.styled-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
.styled-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}
.styled-table tr:nth-child(even) {
    background-color: #f2f2f2;
}
.styled-table tr:hover {
    background-color: #ddd;
}
}
</style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">logo</a>
            <ul class="nav-links">
                <li><a href="dashboard.php">person</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="addservices.php">add services</a></li>
                <li><a href="adduser.php">add user</a></li>
                <li><a href="monitor.php">monitor</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
  <h1>User's</h1>
  <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>region</th>
                    <th>contactAddress</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $person) {
                    echo "<tr>";
                    echo "<td>" . $person['id'] . "</td>";
                    echo "<td>" . $person['firstName'] . " " . $person['lastName'] . "</td>";
                    echo "<td>" . $person['region'] . "</td>";
                    echo "<td>" . $person['contactAddress'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='updateperson.php'>";
                    echo "<input type='hidden' name='id' value='" . $person['id'] . "'>";
                    echo "<button type='submit' class='btn-update'>update</button>";
                    echo "</form>";
                    echo "<form method='POST' action='deleteperson.php'>";
                    echo "<input type='hidden' name='id' value='" . $person['id'] . "'>";
                    echo "<button type='submit' class='btn-delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
