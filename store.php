<?php
session_start();



require('mysqli_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username= mysqli_real_escape_string($dbc,$_REQUEST['username']);
    $password =mysqli_real_escape_string($dbc,$_REQUEST['password']);
    
    $query = "Select * from users where username = '$username' AND password = '$password'";
    $x = @mysqli_query( $dbc, $query) or die($mysqli_error($dbc));
    
    //retrieve book  
    $q= "Select * from bookinventory";
    $y = @mysqli_query($dbc, $q) or die($mysqli_error($dbc));
    
    
    $RECORD_COUNT = @mysqli_num_rows($y);

//    echo "<br>Total Rows inserted: ", $RECORD_COUNT;

    echo '<table id=\"my_table\" ><tr><th>BookID </th><th>Price $</th><th>Title of the Book </th><th>Version of the Book </th><th>PublishYear </th><th>Quantity </th>';
    if($RECORD_COUNT >0){
       while ($row = mysqli_fetch_array($y, MYSQLI_ASSOC)) {   
        echo '<tr class="tblRows">
        <td>'.$row['book_id'].'</td>
        <td>'.$row['price'].'</td>
        <td><a href="checkout.php">'.$row['title'].'</a></td>
        <td>'.$row['version'].'</td>
        <td>'.$row['year'].'</td>
        <td>'.$row['quantity'].'</td>
        </tr>';
        }
    }
     
    
    


}  
    
    mysqli_close($dbc);
?>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("ready!");

            $(".tblRows").click(function() {
                //var row_data = $(this).attr("book_id");
                var bookid = $(this.cells[0]);
                var currentid = bookid.context.textContent;
                document.cookie = "currentid=" +
                    bookid.context.textContent;


            });
        });

        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }

    </script>
    <style type="text/css">
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

        table {
            border-collapse: collapse;
            width: 80%;
            font-family: sans-serif;
            margin-left: 10%;
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;


        }

        th,
        td {
            padding: 8px;
            text-align: center;

        }

        tr:nth-child(even) {
            background-color: lightblue;
        }

        tr:nth-child(odd) {
            background-color: aliceblue;
        }

        th {
            background-color: #4285F4;
            color: white;
        }

        p {
            color: cadetblue;
            font-size: 15pt;

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

        /*        The grid css*/
        /* The grid: Four equal columns that floats next to each other */
        .col {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .col img {
            opacity: 0.8;
            cursor: pointer;
        }

        .col img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .r:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container */
        .con {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the expanded image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

    </style>

</head>

<body>
    <p id="title">Community BookStore</p>
    <ul>
        <li><a href="index.php">Login</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
    <p>Welcome to Community BookStore. For more details please goto the about us and contact us page. Thank you!</p>


    <!--    The grid html-->
    <!-- The four columns -->
    <div class="r">
        <div class="col">
            <img src="img1.jpg" alt="Nature" style="width:100%" height="600px">
        </div>
        <div class="col">
            <img src="img2.jpg" alt="Snow" style="width:100%" height="600px">
        </div>
        <div class="col">
            <img src="img3.jpg" alt="Mountains" style="width:100%" height="600px">
        </div>
        <div class="col">
            <img src="img4.jpg" alt="Lights" style="width:100% " height="600px">
        </div>
    </div>
    <div class="con">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>
    <p>Please select the book title to goto CHECKOUT Page</p>






</body>

</html>
