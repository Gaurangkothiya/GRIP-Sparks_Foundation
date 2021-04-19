<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-image: url('https://image.freepik.com/free-photo/stock-market-forex-trading-graph-graphic-double-exposure_73426-193.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #firstBitch {
            width: 700px;
            margin: 50px 50px 50px 50px;
            display: inline-block;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="card" id='firstBitch'>
        <div class='card-header text-center'>
            <h1> Basic Banking System </h1>
        </div>

        <div class='card-body text-center'>
            <?php

            $servername = 'localhost:3306';
            $username = 'root';
            $password = '';
            $dbname = 'bank';

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                echo '<h1> Not connected </h1>';
            } else {
                echo '<div class="alert alert-success">
                <strong>All Customers </strong> 
              </div>';

                $sql = "SELECT * FROM `transfer`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="table">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Customer-1 Id</th>
                            <th>Customer-2 Id</th>
                            <th>Amount Transfered(&#8377;)</th>
                            </tr>
                            </thead>
                            <tbody>
                ';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr class="table-info">';
                        echo "<td>" . $row["id"] . "</td><td>" . $row["customer-id-1"] . "</td><td>" . $row["customer-id-2"] . "</td><td> " . $row["amount"] . "</td></tr>";
                    }
                    echo '</tbody></table>';
                }
            }
            ?>

            <div class="card-footer">

                <button type="button" class="btn btn-primary" id="backMain"> Back to Main page</button>
                <script type="text/javascript">
                    document.getElementById("backMain").onclick = function() {
                        location.href = "main.html";
                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>