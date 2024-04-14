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

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['prd_name'];
    $quantity = $_POST['qty'];
    $addressSender = $_POST['add_sender'];
    $addressReceiver = $_POST['add_reciever'];
    
    // Check if 'id' is set in the URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Insert data into the columns of the existing ID
        $sql = "UPDATE blockchain_data SET prd_name = '$productName', qty = '$quantity', add_sender = '$addressSender', add_reciever = '$addressReceiver' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No ID provided in the URL";
    }
}
?>

<!-- HTML form with fetched data -->
<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="form-container">
                <h1>WHOLESALER FORM</h1>
                <!-- Pass the ID in the form action attribute -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="prd_name" class="form-control" placeholder="Enter">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="qty" class="form-control" placeholder="Enter">
                    </div>
                    <div class="form-group">
                        <label>Address Sender</label>
                        <input type="text" name="add_sender" class="form-control" placeholder="Enter">
                    </div>
                    <div class="form-group">
                        <label>Address Receiver</label>
                        <input type="text" name="add_reciever" class="form-control" placeholder="Enter">
                    </div>
                      <div class="submit-btn" style="display: flex; justify-content: space-between;">
    <button type="submit">Submit</button>
    <a href="whole_chain.php?id=a0116df" class="btn btn-primary connect-button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">Connect</a>
</div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


