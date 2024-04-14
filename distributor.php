<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISTRIBUTOR FORM</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Sidebar */
        .sidebar {
            background-color: #343a40;
            color: #ffffff;
            padding-top: 20px;
            width: 250px;
            height: 100vh; /* Adjust height as needed */
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
        }

        .sidebar ul li.active {
            background-color: #2c3136;
        }

        .sidebar ul li:hover {
            background-color: #2c3136;
        }

        .sidebar ul li.active a {
            color: #ffffff;
            font-weight: bold;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px; /* Same width as sidebar */
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
   <!--  <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar">
            <ul>
                <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar">
    <ul>
        <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="manufacturer.php"><i class="fas fa-cart-arrow-down"></i> MANUFACTURER</a></li>
        <li><a href="distributor.php"><i class="fas fa-cart-arrow-down"></i> DISTRIBUTOR</a></li>
        <li><a href="#"><i class="fas fa-cart-arrow-down"></i> VENDOR</a></li>
        <li><a href="#"><i class="fas fa-cart-arrow-down"></i> WHOLESALER</a></li>
        <li><a href="#"><i class="fas fa-cart-arrow-down"></i> CUSTOMER</a></li>
    </ul>
</aside> -->

              <!--   <li><a href="#"><i class="fas fa-cart-arrow-down"></i> VENDOR</a></li>
                <li><a href="#"><i class="fas fa-cart-arrow-down"></i> WHOLESALER</a></li>
                <li><a href="#"><i class="fas fa-cart-arrow-down"></i> CUSTOMER</a></li>
            </ul>
        </aside> -->

    <!-- Main Content -->
    <?php
// Include your database connection file
include("connection.php");

// Initialize variables to store form field values
$country = "";
$managed_by = "";
$fulfill_via = "";
$shipment_mode = "";

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from the database based on the ID
    $sql = "SELECT * FROM blockchain_data WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the first row of the result
        $row = $result->fetch_assoc();

        // Assign fetched data to variables
        $country = $row['country'];
        $managed_by = $row['managed_by'];
        $fulfill_via = $row['fulfill_via'];
        $shipment_mode = $row['shipment_mode'];
        $delivered_to_client_date = $row['delivered_to_client_date'];
        $delivery_recorded_date = $row['delivery_recorded_date'];
        
         
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "No ID provided in the URL";
}
?>

<div class="main-content">
    <div class="form-container">
        <h1>DISTRIBUTOR FORM</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" placeholder="Enter" value="<?php echo $country; ?>">
            </div>
            <div class="form-group">
                <label for="managed_by">Managed By</label>
                <input type="text" name="managed_by" id="managed_by" value="<?php echo $managed_by; ?>">
            </div>
            <div class="form-group">
                <label for="fulfill_via">Fulfill Via</label>
                <input type="text" name="fulfill_via" id="fulfill_via" value="<?php echo $fulfill_via; ?>">
            </div>
            <div class="form-group">
                <label for="shipment_mode">Shipment Mode</label>
                <input type="text" name="shipment_mode" id="shipment_mode" placeholder="Enter" value="<?php echo $shipment_mode; ?>">
            </div>
            <div class="form-group">
               <label class="labletypetextJP01">DELIVERED TO CLIENT DATE</label>
                                                
                <input type="text" name="shipment_mode" id="shipment_mode" placeholder="Enter" value="<?php echo $delivered_to_client_date; ?>">
            </div>

             <div class="form-group">
                                                <label class="labletypetextJP01">Delivery Recorded Date</label>
                                                <input type="text" class="inputtypetextJP01"
                                                    placeholder="Enter"value="<?php echo $delivery_recorded_date; ?>">
                                            </div>


                                            
           <div class="form-group" style="display: flex; justify-content: space-between;">
    <button type="submit">Submit</button>
    <a href="distr_chain.php?id=a0116df" class="btn btn-primary connect-button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">Connect</a>
</div>
        </form>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
