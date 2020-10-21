<?php
    //require('mysqli_connect.php');
    
    if (isset($_POST['submit']))

    {

       myfunction();

    }
    function myfunction(){
    
        //create conn
        $link = mysqli_connect("localhost", "root", "", "bookstorecreator"); 
        //check conn
        if($link === false){ 
            die("ERROR: Could not connect. "  
                        . mysqli_connect_error()); 
        } 
        
        foreach($_COOKIE as $currentid => $val){
            if($currentid=='currentid'){
            $sql = "UPDATE bookinventory SET quantity = (quantity - 1) WHERE book_id = '".$val."'";
            $r = @mysqli_query(dbc, $sql);
                
            
                }
            
        }
        
        
        if(mysqli_query($link, $sql)){ 
            // Display the alert box  
            echo '<script>alert("Record updated successfully for the selected book")</script>'; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($link); 
        }  
             
        mysqli_close($link);

    }

    


      

        
?>
<html>

<head>

    <script>
        function validateForm() {
            var x = document.forms["myForm"]["firstname"].value;
            var y = document.forms["myForm"]["lastname"].value;

            if ((x == "") || (y == "")) {
                alert("Both names are required");
                return false;
            }

            var cname = document.forms["myForm"]["cardname"].value;
            if (cname != ((x) + " " + (y))) {
                alert("Cardname should be same as your first and lastname");
                return false;
            }

            var cardnum = document.forms["myForm"]["cardnumber"].value;
            if (cardnum.length != 16) {
                alert("Cardnumber must be 16 digit number");
                return false;
            }
            var expmon = document.forms["myForm"]["expmonth"].value;
            if ((expmon < 1) && (expmon > 12)) {
                alert("Expiry month entry is invalid!");
                return false;
            }

            var expyr = document.forms["myForm"]["expyear"].value;
            if (expyr < 2020) {
                alert("Expired year! Sorry try later");
                return false;
            }
            var cvvnum = document.forms["myForm"]["cvv"].value;
            if (cvvnum.length < 3) {
                alert("Invalid number");
                return false;
            }

        }

    </script>
    <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Artifika', sans-serif;
            margin: 0;
            background-color: azure;
            text-align: center;

        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .row {
            width: 50%;
            margin-left: 25%;
            font-family: sans-serif;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4285F4;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: black;
        }

        span.price {
            float: right;
            color: grey;
        }

        #title {
            font-size: 24pt;
            color: #4285F4;
            text-align: center;
            margin-top: 10px;
            font-family: 'Bangers', sans-serif;
            font-style: bold;
        }

        /*        The nav css starts below*/
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #4285F4;
        }

        /*        the nav css ends here*/
        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }

    </style>



</head>

<body>
    <p id="title">Community BookStore</p>
    <ul>
        <li><a href="index.php">Login</a></li>
        <li><a class="active" href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form name="myForm" action="checkout.php" method="post" onsubmit="return validateForm()">

                    <div class="row">
                        <div class="col-50">
                            <h3>Personal Info</h3>
                            <label for="fname"><i class="fa fa-user"></i> First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="First Name">

                            <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="last Name">


                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <label for="expyear">Exp Year</label>
                            <input type="text" id="expyear" name="expyear" placeholder="2018">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="352">
                        </div>

                    </div>

                    <button type="submit" name="submit" value="CheckOut" class="btn">CheckOut</button><br />
                </form>
            </div>
        </div>


    </div>
</body>

</html>
