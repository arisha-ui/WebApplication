<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Chain</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
            padding: 20px;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: grey;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .line {
            width: 50px;
            height: 2px;
            background-color: #000;
            margin-bottom: 10px;
        }

        .text {
            text-align: center;
            font-size: 12px;
        }

        .tick {
            background-color: burlywood;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="step">
            <div class="circle tick">✔️</div>
           
            <div class="text">At Manufacturer</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">2</div>
            
            <div class="text">Collected by Transporter</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">3</div>
           
            <div class="text">Delivered to Distributor</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">4</div>
            
            <div class="text">Delivered to Vendor</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">5</div>
            
            <div class="text">Delivered to Wholesaler</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">6</div>
            
            <div class="text">Medicine Delivered</div>
        </div>
        
    </div>
</body>
</html>
