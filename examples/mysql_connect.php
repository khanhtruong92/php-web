<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP MySQL</title>
</head>
<body>
    <p>
        <?php
            $connection = new mysqli("localhost:3306", "root", "khanh1992", "php_web");
            // connect_error is a properties of connection, it's null if there is no error
            if ($connection->connect_error != null) {
                echo "Failed to connect to MySQL: " . $connection->connect_error;
            } else {
                echo "Connected to MySQL successfully";
                $connection->close();
            }
        ?>
    </p>
</body>
</html>
