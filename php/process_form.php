<?php
// Database credentials
$serverName = "your_server_name"; // Replace with your SQL Server hostname or IP address
$connectionOptions = array(
    "Database" => "user_registration", // Connect to the master database to create a new database
    "Uid" => "DESKTOP-HF2D34F", // Replace with your SQL Server username
    "PWD" => "your_password" // Replace with your SQL Server password
);

// Attempt to connect to SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// SQL query to create the database
$sqlCreateDatabase = "CREATE DATABASE user_registration";

// Execute the query to create the database
$stmtCreateDatabase = sqlsrv_query($conn, $sqlCreateDatabase);

if ($stmtCreateDatabase === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Database created successfully";

// SQL query to switch to the user_registration database
$sqlUseDatabase = "USE user_registration";
$stmtUseDatabase = sqlsrv_query($conn, $sqlUseDatabase);

if ($stmtUseDatabase === false) {
    die(print_r(sqlsrv_errors(), true));
}

// SQL query to create the users table
$sqlCreateTable = "CREATE TABLE users (
    id VARCHAR(50) PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    country VARCHAR(50) NOT NULL
)";

// Execute the query to create the table
$stmtCreateTable = sqlsrv_query($conn, $sqlCreateTable);

if ($stmtCreateTable === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Table created successfully";

// SQL query to retrieve data from the users table
$sqlRetrieveData = "SELECT * FROM users";

// Execute the query to retrieve data
$stmtRetrieveData = sqlsrv_query($conn, $sqlRetrieveData);

if ($stmtRetrieveData === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Display data from the users table
echo "<h2>User Data</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Password</th><th>Gender</th><th>Country</th></tr>";

while ($row = sqlsrv_fetch_array($stmtRetrieveData, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close connection
sqlsrv_close($conn);
?>
