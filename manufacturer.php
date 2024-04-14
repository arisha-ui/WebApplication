<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer Form</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #343a40;
            color: #ffffff;
            padding-top: 20px;
            width: 250px; /* Set the width */
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

        .content-wrapper {
            flex: 1;
            padding: 20px;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
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

<?php
// Initialize variables
$dosage = '';
$dosage_form = '';
$brand_molecule = '';
$delivered_date = '';

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from the database based on the ID
    $sql = "SELECT * FROM blockchain_data WHERE id = $id";
   
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of the first row (assuming ID is unique)
        $row = $result->fetch_assoc();

        // Assign fetched data to variables
        $dosage = $row['dosage(mg/ml)'];
        $dosage_form = $row['dosage_form'];
        $brand_molecule = $row['brand'];
        $delivered_date = $row['delivered_to_client_date'];
       
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "No ID provided in the URL";
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $expiration_date = $_POST['expiration_date'];
    
    // Check if 'id' is set in the URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Update the expiration date for the existing ID
        $sql = "UPDATE blockchain_data SET expiration_date = '$expiration_date' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully";
        } else {
            echo "Error updating expiration date: " . $conn->error;
        }
    } else {
        echo "No ID provided in the URL";
    }
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <h1>MANUFACTURER FORM</h1>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="dosage">DOSAGE</label>
                        <input type="text" name="dosage" id="dosage" placeholder="Enter" value="<?php echo $dosage; ?>">
                    </div>
                    <div class="form-group">
                        <label for="dosage_form">DOSAGE FORM</label>
                        <input type="text" name="dosage_form" id="dosage_form" placeholder="Enter" value="<?php echo $dosage_form; ?>">
                    </div>
                    <div class="form-group">
                        <label for="brand_molecule">BRAND, MOLECULE/Test type</label>
                        <input type="text" name="brand_molecule" id="brand_molecule" placeholder="Enter" value="<?php echo $brand_molecule; ?>">
                    </div>
                    <div class="form-group">
                        <label for="delivered_date">DELIVERED TO CLIENT DATE</label>
                        <input type="text" name="delivered_date" id="delivered_date" value="<?php echo $delivered_date; ?>">
                    </div>
                    <div class="form-group">
                        <label for="expiration_date">EXPIRATION DATE</label>
                        <input type="text" name="expiration_date" id="expiration_date">
                    </div>
<div class="form-group" style="display: flex; justify-content: space-between;">
    <button type="submit">Submit</button>
    <a href="manuf_table.php?id=a0116df" class="btn btn-primary connect-button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">Connect</a>
</div>

<script>
    // Detect the MetaMask Ethereum provider

import detectEthereumProvider from '@metamask/detect-provider';

const provider = await detectEthereumProvider();

if (provider) {
  startApp(provider);
} else {
  console.log('Please install MetaMask!');
}

function startApp(provider) {
  if (provider !== window.ethereum) {
    console.error('Do you have multiple wallets installed?');
  }
}

// Prompt users to connect to MetaMask

const ethereumButton = document.querySelector('.enableEthereumButton');
const showAccount = document.querySelector('.showAccount');

ethereumButton.addEventListener('click', () => {
  getAccount();
});

async function getAccount() {
  const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' })
    .catch((err) => {
      if (err.code === 4001) {
        console.log('Please connect to MetaMask.');
      } else {
        console.error(err);
      }
    });
  const account = accounts[0];
  showAccount.innerHTML = account;
}
</script>


                </form>
            </div>
        </div>
    </div>
</body>


</body>

</html>

