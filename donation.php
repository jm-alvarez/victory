<?php
    require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <style>
        :root {
    --logo-color: #02458d;
    --logo-color-50: #02458dd2;
    --secondary: #d1d1d1;
    --card-width: 290px;
}

* {
    font-family: 'Montserrat';
    list-style: none;
    text-decoration: none;
    left: 0; right: 0; top: 0;
    transition: all ease .3s;
    scroll-behavior: smooth;
    border-style: none;
    border: 0;
    margin: 0;
    padding: 0;
}
        body {
              margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            background-color: var(--logo-color);
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px 5px 0 0;
            font-size: 18px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, 
        .form-group select, 
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="radio"] {
            width: auto;
        }
        
        .form-group .autofill-button:hover {
            background-color: #004d26;
        }
        .submit-button {
            background-color:var(--logo-color);
            color: white;
            font-size: 16px;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit-button:hover {
            background-color:var(--logo-color);
        }

        .cancel-button {
            display: flex;
            background-color: transparent;
            color: var(--logo-color);
            border: 1px solid var(--logo-color);
            font-size: 16px;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            align-items: center;
            justify-content: center;
        }
        .cancel-button:hover {
            background-color: red;
            color: #fff;
            border: 1px solid red;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">Donation Form</div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="first_name">Name <span class="error">(Required)</span></label>
                <input type="text" name="first_name" placeholder="First" required>
                <input type="text" name="last_name" placeholder="Last" required>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="error">(Required)</span></label>
                <input type="email" name="email" placeholder="Enter Email" required>
                <!-- <input type="email" name="confirm_email" placeholder="Confirm Email"> -->
            </div>
            <div class="form-group">
            <label>Donation Amount <span class="error">(Required)</span></label>
<div>
    <input type="radio" name="donation_amount" value="10" id="amount_10"> 10 Pesos
    <input type="radio" name="donation_amount" value="50" id="amount_50"> 50 Pesos
    <input type="radio" name="donation_amount" value="250" id="amount_250"> 250 Pesos
    <input type="radio" name="donation_amount" value="other" id="amount_other"> Other amount
</div>

<!-- The text box that will appear when "Other" is selected -->
<div id="other_amount_container" style="display: none;">
    <label for="other_amount">Specify your donation amount:</label>
    <input type="number" name="other_amount" id="other_amount" placeholder="Enter amount" required>
</div>

<script>
// JavaScript to toggle the visibility of the 'Other amount' text box
document.getElementById('amount_other').addEventListener('change', function() {
    document.getElementById('other_amount_container').style.display = 'block';
});

document.querySelectorAll('input[name="donation_amount"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        if (this.value !== 'other') {
            document.getElementById('other_amount_container').style.display = 'none';
        }
    });
});
</script>

            <div class="form-group">
                <label for="card_number">Donation details</label>
                <input type="text" name="card_number" placeholder="Account Number" required>
                </div>
            <div class="form-group">
                <input type="text" name="cardholder_name" placeholder="Account Name" required>
            </div>
            <button type="submit" class="submit-button" name="submit">Submit</button>
            
            <?php
                if(isset($_POST['submit'])){
                    $firstname = $_POST['first_name'];
                    $lastname = $_POST['last_name'];
                    $email = $_POST['email'];
                    $donation_amount = $_POST['donation_amount'];
                    $acc_no = $_POST['card_number'];
                    $acc_name = $_POST['cardholder_name'];

                    $d_query = $mysqli->query("INSERT INTO donations_tbl SET firstname='$firstname', lastname='$lastname', email='$email', donation_amount='$donation_amount', acc_no='$acc_no', acc_name='$acc_name'");
                    if(!$d_query){
                        echo $mysqli->error;
                    } elseif($mysqli->affected_rows == 0){
                        ?>
                            <script>
                                alert("Failed.");
                            </script>
                        <?php
                    } else {
                        ?>
                            <script>
                                alert("Success");
                            </script>
                        <?php
                    }

                }
            ?>
            <a href="index.php" class="cancel-button">Cancel</a>
        </form>
    </div>
</body>
</html>