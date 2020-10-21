<?php 

	require('mysqli_connect.php');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
			$username= mysqli_real_escape_string($dbc,$_REQUEST['username']);
            $password =mysqli_real_escape_string($dbc,$_REQUEST['password']);
    
            $query = "Select * from users where username = 'admin' AND password = '123'";
            $r = @mysqli_query( $dbc, $query) or die($mysqli_error($dbc));
    

			if (mysqli_num_rows($r) == 1) {
			echo "Login Successful!";
            

			}
			else {
			echo "Incorrect account information. Please try again!";
			}
            
		}

?>


<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(books-1163695_1920.jpg);
        }

        * {
            box-sizing: border-box
        }

        h1,
        p {
            margin-left: 18%;
            color: white;
        }

        form {
            background-color: white;
            padding: 20px;
            float: right;
            margin-right: 25%;
            width: 25%;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }


        input[type=submit] {
            background-color: #4285F4;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

    </style>
</head>

<body>
    <h1>Welcome to the BookStore</h1>
    <p>Please enter your credentials to visit</p>
    <form action="store.php" method="post">
        Username: <input type="text" name="username" id="inputcss" required><br><br>
        Password: <input type="password" name="password" id="inputcss" required><br><br>
        <input type="submit">
    </form>

</body>

</html>
