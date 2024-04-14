<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISTRIBUTOR FORM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .submit-btn {
            text-align: center;
        }

        .submit-btn button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn button:hover {
            background-color: #0056b3;
        }

        hr {
            border-top: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }
    </style>
</head>
<?php 
include("connection.php");

// Initialize variables
$dosage = '';
$dosage_form = '';
$brand = '';
$molecule = '';

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
        $dosage = $row['dosage(mg/ml)'];
        $dosage_form = $row['dosage_form'];
        $brand = $row['brand'];
        $molecule = $row['molecule/test_type'];
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "No ID provided in the URL";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Insert data into the database
    $sql_insert = "UPDATE blockchain_data SET vendor_quantity = '$quantity', price = '$price' WHERE id = $id";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}
?>

<!-- HTML form with fetched data -->
<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="form-container">
                <h1>VENDOR FORM</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="dosage">Dosage</label>
                        <input type="text" id="dosage" class="form-control" placeholder="Enter dosage" value="<?php echo isset($dosage) ? $dosage : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="dosage_form">Dosage Form</label>
                        <input type="text" id="dosage_form" class="form-control" placeholder="Enter dosage form" value="<?php echo isset($dosage_form) ? $dosage_form : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" id="brand" class="form-control" placeholder="Enter brand" value="<?php echo isset($brand) ? $brand : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="molecule">Molecule</label>
                        <input type="text" id="molecule" class="form-control" placeholder="Enter molecule" value="<?php echo isset($molecule) ? $molecule : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price">
                    </div>
                       <div class="submit-btn" style="display: flex; justify-content: space-between;">
    <button type="submit">Submit</button>
    <a href="vendor_chain.php?id=a0116df" class="btn btn-primary connect-button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">Connect</a>
</div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
