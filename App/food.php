<?php include'./functions.php';
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fitness Tracker</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Style Sheet-->
    <link href="./CSS/MenuStyle.css" rel="stylesheet">
    <!-- Font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;1,200;1,800&display=swap" rel="stylesheet">
</head>
<body>

    <!--Navbar-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./Images/Logo.png" width="65" height="65"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item font mr-5">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item font mr-5">
                            <a class="nav-link " href="Menu.html">Menu</a>
                        </li>
                        <li class="nav-item font mr-5">
                            <a class="nav-link " href="About.html">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div class="container">
Testing examples:</br>
ID: 1 through 8</br>
<h2 class="pt-3 pb-2"> Select a Food to be Added </h2>
<form action='#' method='POST'>
<?php
        try
	{
		error_reporting(0);
                $pdo = connectPdo();
		
                $data = $pdo->query("SELECT Food FROM Meals;");
                $foods = $data->fetchAll(PDO::FETCH_ASSOC);

                $val = array();
                $counter = 0;
                foreach($foods as $food)
                {
                        $val[$counter] = $food["Food"];
                        $counter++;
                }

                $size = count($val);

                for($x = 0; $x < $size; $x++)
                {
                        $text = $val[$x];
			echo "<h4 class=\"pb-3\">";
                        echo $text." ";
                        echo "<input type='radio' name='radio1' value='$text' required/>";
                        echo "</h4>";
                }
        }
        catch(PDOexception $e)
        {
                echo "Connection to database failed: ".$e->getMessage();
        }
?>
<p class="pt-1"> Enter ID:  <input type='text' name='id' required> </p>
<p> Amount: <input type='number' name='amount' required></p>

<h2> Please Select a Unit: </h2>
Grams <input type='radio' name='radio2' value='grams' required>
Cups <input type='radio' name='radio2' value='cups'>
Liters <input type='radio' name='radio2' value='liters'>
Milliliters <input type='radio' name='radio3' value='milliliters'>
<input type='submit' name='Submit' value='Submit'>
<input type='reset' value='Reset'>

</form>
</div>
<?php 
	if($_POST["Submit"] == "Submit"){
	try{
			
		$pdo = connectPdo();
		$id = $_POST["id"];
                $food = $_POST["radio1"];
                $date = date("Y-m-d") . " " . date("H-i-s");
		$amount = $_POST["amount"];
		$unit = $_POST["radio2"];

		if($unit == "cups")
		{
			$amount *= 200;
			$amount /= 100;
		}
		
		if($unit == "liters")
		{
			$amount *= 1000;
			$amount /= 100;
		}

		if($unit == "grams")
		{
			$amount /= 100;
		}

		if($unit == "milliliters")
		{
			$amount /= 100;
		}
		if($amount < 1){
			$amount = 1;
		}


                $addFood = $pdo->prepare("INSERT INTO Consumes_Meal VALUES('$id','$food','$date','$amount');");
                $addFood->execute();

		echo"<div class=\"container\">";
	echo"<h2>Added!</h2>";
	echo"</div>";
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
?>
<footer class="footer">
	<div class="container">
		<div class="row pt-5">
			<div class="col-sm text-white"> Contact: 1-800-123-4567</div>
			<div class="col-5"></div> 
			<div class="col-sm text-white"> CSCI Homies </div>
		</div>
	</div>
</footer>
</body>
</html>
