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
        <div class='card-header'>
            <h1> Basic Banking System </h1>
        </div>

        <div class='card-body'>
            <br>
            <?php
            $name = $_POST['uname'];
            $password = $_POST['pswd'];

            $flag = $name == 'Gaurangkothiya' || $name == 'gaurangkothiya@gmail.com';
            $flag = $flag && $password == 'gaurang0501';

            if ($flag) {
                echo '<div class="alert alert-success">
                <strong>Successfully Login !</strong> 
              </div>';
                echo '<br>';
                echo ' <button type="button" class="btn btn-primary btn-block" id="gotoHome">Next</button><br><br>';
                echo '
                    <div class="card-footer"> <button type="button" class="btn btn-primary" id="backHome"> Log Out</button> </div>
                ';
                echo '
                <script type="text/javascript">
                    document.getElementById("backHome").onclick = function () {
                        location.href = "index.html";
                    }
                    document.getElementById("gotoHome").onclick = function () {
                        location.href = "main.html";
                    }
                </script>
                ';
            } else {
                echo ' <div class="alert alert-danger ">
                <strong>Invalid Id or Password !</strong>  
              </div> ';
                echo '<br>';
                echo '<button type="button" class="btn btn-primary btn-block" id="backButton">Back To Login</button>';
                echo '
                <script type="text/javascript">

                    document.getElementById("backButton").onclick = function () {
                        location.href = "index.html";
                    }
                </script>
                ';
            }

            ?>
            <br>
        </div>
    </div>

</body>

</html>