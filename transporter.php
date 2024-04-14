<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporter Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .content-wrapper {
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .Campaigns-DetailsJP08 h3 {
            margin-bottom: 10px;
        }

        .Campaigns-DetailsJP08 hr {
            margin-bottom: 20px;
            border-top: 1px solid #ccc;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .but_001 button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .but_001 button:hover {
            background-color: #45a049;
        }

        footer.main-footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<?php
include("connection.php");
$shipment_mode = "";
$shipment_id = "";
$delivered_to_client_date = "";
$delivery_recorded_date = "";
// Check if the ID is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to fetch data from the database based on the ID
    $sql = "SELECT * FROM blockchain_data WHERE id = $id";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch data from the database
        $row = $result->fetch_assoc();
        $shipment_mode = $row['shipment_mode'];
        $shipment_id = $row['id'];
        $delivered_to_client_date = $row['delivered_to_client_date'];
        $delivery_recorded_date = $row['delivery_recorded_date'];
       
    } else {
        // No data found for the given ID
        echo "No data found for ID: $id";
    }

    // Close the database connection
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shipment_delivered = $_POST['shipment_delivered'];

    // Update the database with the shipment delivered status
    $sql_update = "UPDATE blockchain_data SET shipment_delivered = '$shipment_delivered' WHERE id = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Shipment delivered status updated successfully";
    } else {
        echo "Error updating shipment delivered status: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporter Form</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="main-content">
        <div class="form-container">
            <h1>TRANSPORTER FORM</h1>
            <div class="content-wrapper">
                <div class="card">
                    <div class="Campaigns-DetailsJP08">
                        <h3>Details</h3>
                        <hr>
                        <form method="post">
                            <div class="form-group">
                                <label for="shipment_mode">Shipment mode</label>
                                <input type="text" id="shipment_mode" placeholder="Enter" value="<?php echo $shipment_mode; ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipment_id">Shipment ID</label>
                                <input type="text" id="shipment_id" placeholder="Enter" value="<?php echo $shipment_id; ?>">
                            </div>
                            <div class="form-group">
                                <label for="delivered_to_client_date">Delivered to client date</label>
                                <input type="text" id="delivered_to_client_date" placeholder="Enter" value="<?php echo $delivered_to_client_date; ?>">
                            </div>
                            <div class="form-group">
                                <label for="delivery_recorded_date">Delivery recorded date</label>
                                <input type="text" id="delivery_recorded_date" placeholder="Enter" value="<?php echo $delivery_recorded_date; ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipment_delivered">Shipment delivered</label>
                                <select id="shipment_delivered" name="shipment_delivered">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                          <div class="but_001" style="display: flex; justify-content: space-between;" >
    <button type="submit">Submit</button>
    <a href="final_chain.php?id=a0116df" class="btn btn-primary connect-button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">Connect</a>
                </form>
            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>&copy;2024 <a href="/"></a>.</strong> All rights reserved.
    </footer>
</body>

</html>
