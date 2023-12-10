<?php
session_start();
require_once('db/dbconnect.php');
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
$loggedInUserName = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include("topnav/topnav.php");
    if ($_SESSION['user']['username'] === 'admin') {
        try {
            // Fetch orders from the database
            $sql = "SELECT order_id, customer_id, order_details, order_date FROM orders";
            $stmt = $connDB->query($sql);

            if ($stmt) {
                // Display the orders in a table
                echo "<table border='1'>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Order Details</th>
                            <th>Order Date</th>
                        </tr>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['order_id']}</td>
                            <td>{$row['customer_id']}</td>
                            <td>{$row['order_details']}</td>
                            <td>{$row['order_date']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "Error fetching orders: " . $connDB->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the PDO database connection
        $your_pdo_connection = null;
    }
    ?>



</body>

</html>