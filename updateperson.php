<?php 
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPassword = ""; 
$dbName = "exam"; 

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPassword = ""; 
$dbName = "exam"; 

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);


    $sql = "SELECT * FROM person WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $first_name = $row['firstName'];
        $middle_name = $row['middleName'];
        $last_name = $row['lastName'];
        $region = $row['region'];
        $contactAddress = $row['contactAddress'];
        $services_name = $row['services_name'];
    } else {
        echo "User not found.";
        exit;
    }

    

    $conn->close();
} else {
    echo "User ID not provided.";
    exit;


}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Person</title>
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

/* Style the buttons on hover */
.btn-edit:hover,
.btn-delete:hover {
    background-color: #0056b3;
}

/* Style the buttons within table cells */
td button {
    display: inline-block;
}

/* Center buttons within table cells */
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
body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
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
    <div class="container">
        <form action="saveupdateperson.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"required>
                <input type="text" id="firstName" name="firstName" value="<?php echo $first_name; ?>"required>
            </div>
            <div class="form-group">
                <label for="middleName">Middle Name:</label>
                <input type="text" id="middleName" name="middleName"value="<?php echo $middle_name; ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName"value="<?php echo $last_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" id="region" name="region"value="<?php echo $region; ?>">
            </div>
            <div class="form-group">
                <label for="contactAddress">Contact Address:</label>
                <input type="text" id="contactAddress" name="contactAddress"value="<?php echo $contactAddress; ?>">
            </div>
            <input type="hidden" id="services_name" name="services_name" value="<?php echo $services_name; ?>">

            <button type="submit">Submit</button>
        </form>
        <?php if (isset($insert_error)) echo "<p>$insert_error</p>"; ?>
    </div>
</body>
</html>
