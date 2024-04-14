
<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }
        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: calc(33.33% - 30px);
            margin-bottom: 30px;
            transition: transform 0.3s ease-in-out;
        }
        .box:hover {
            transform: translateY(-5px);
        }
        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Dashboard</h1>
    <div class="container">
        <div class="box">
            <h2>Manufacturer</h2>
            <form id="manufacturerForm">
                <input type="text" id="manufacturerInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        <div class="box">
            <h2>Distributor</h2>
            <form id="distributorForm">
                <input type="text" id="distributorInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
         <div class="box">
            <h2>Transporter</h2>
            <form id="transporterForm">
                <input type="text" id="transporterInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        <div class="box">
            <h2>Vendor</h2>
            <form id="vendorForm">
                <input type="text" id="vendorInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        <div class="box">
            <h2>Wholesaler</h2>
            <form id="whForm">
                <input type="text" id="whInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        <div class="box">
            <h2>Customer</h2>
            <form id="csForm">
                <input type="text" id="csInput" placeholder="Enter ID">
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>


    <script>
        // Function to handle form submission for manufacturer
        document.getElementById('manufacturerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('manufacturerInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to manufacturer.php with the ID in the URL
                        window.location.href = 'manufacturer.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });

        // Function to handle form submission for distributor
        document.getElementById('distributorForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('distributorInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to distributor.php with the ID in the URL
                        window.location.href = 'distributor.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });
        document.getElementById('transporterForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('transporterInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to distributor.php with the ID in the URL
                        window.location.href = 'transporter.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });


        document.getElementById('vendorForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('vendorInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to distributor.php with the ID in the URL
                        window.location.href = 'vendor.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });

        document.getElementById('whForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('whInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to distributor.php with the ID in the URL
                        window.location.href = 'wholesaler.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });

        document.getElementById('csForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
    
            // Get the entered ID
            var id = document.getElementById('csInput').value;
    
            // Send AJAX request to validate the ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'dashboard.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If ID is valid, redirect to distributor.php with the ID in the URL
                        window.location.href = 'customer.php?id=' + id;
                    } else {
                        // If ID is invalid or not found, display an error message
                        alert('Invalid ID. Please enter a valid ID.');
                    }
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
<?php


// Get the ID from the request
$id = $_GET['id'];

// Validate the ID against your database
$sql = "SELECT id FROM blockchain_data WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ID found in the database, return success
    http_response_code(200);
} else {
    // ID not found in the database, return error
    http_response_code(404);
}

?>