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
            display: inline-block;
            width: 700px;
            margin: 50px 50px 50px 50px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="card" id='firstBitch'>
        <div class='card-header text-center'>
            <h1> Basic Banking System </h1>
        </div>

        <div class='card-body'>
            <br>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="needs-validation" method='POST' novalidate>
                <div class="form-group">
                    <label for="idone">Customer one Id:- </label>
                    <input type="number" class="form-control" id="idone" placeholder="Enter first customer id" name="idone" required>
                </div>
                <div class="form-group">
                    <label for="idtwo">customer two Id:- </label>
                    <input type="number" class="form-control" id="idtwo" placeholder="Enter Second customer id" name="idtwo" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount in (&#8377;) :-</label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter Amount to be transferred" name="amount" required>
                </div>
                <button type="submit" name='submit' class="btn btn-success btn-block">Submit</button>
            </form>
            <script>
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        var forms = document.getElementsByClassName('needs-validation');
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>

            <?php

            if (isset($_POST['submit'])) {

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bank";

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    echo '<h1> Not connected </h1>';
                } else {

                    $idone = $_POST['idone'];
                    $idtwo = $_POST['idtwo'];
                    $amount = $_POST['amount'];
                    $sql = "SELECT balance FROM customer where id = $idone";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    if ($row['balance'] >= $amount) {
                        $row['balance'] = $row['balance'] - $amount;
                        $temp = $row['balance'];
                        $sql = "UPDATE customer SET balance = $temp WHERE id = $idone";
                        $conn->query($sql);

                        $sql = "SELECT balance FROM customer where id = $idtwo";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $row['balance'] = $row['balance'] + $amount;
                        $temp = $row['balance'];
                        $sql = "UPDATE customer SET balance = $temp WHERE id = $idtwo";
                        $conn->query($sql);

                        $sql = "INSERT INTO `transfer`(`customer-id-1`, `customer-id-2`, `amount`) VALUES ($idone,$idtwo,$amount)";
                        if ($conn->query($sql) === TRUE) {
                            echo '
                                <div class="alert alert-success"> Successfully Transfered </div>
                                <br>
                                <button type="button" class="btn btn-primary" id="backMain"> Back to Main page</button>
                                <script type="text/javascript">
                                    document.getElementById("backMain").onclick = function() {
                                    location.href = "main.html";
                                    }
                                </script>
                                ';
                        } else {
                            echo '<br>
                        <div class="alert alert-danger "><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Invalid Amount or Id !</strong>
                            Try Again !
                        </div>                 
                        ';
                        }
                    } else {
                        echo '<br>
                        <div class="alert alert-danger "><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Invalid Amount or Id !</strong>
                            Try Again !
                        </div>     
                        <button type="button" class="btn btn-primary" id="backMain"> Back to Main page</button>
                                <script type="text/javascript">
                                    document.getElementById("backMain").onclick = function() {
                                    location.href = "main.html";
                                    }
                                </script>            
                        ';
                    }
                }
            }
            ?>

        </div>
    </div>
</body>

</html>