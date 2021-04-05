<?php include'./functions.php';
error_reporting(0);
?>
<html>
<html lang="en">
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
                            <a class="nav-link" href="Menu.html">Menu</a>
                        </li>
                        <li class="nav-item font mr-5">
                            <a class="nav-link " href="About.html">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div class="text-center">
	<form action='#' method='POST'>
		<h2 class="mt-5 mb-3"> Click to View the Food Database </h2>
		<div class="mb-4">
			<input type='submit' name='Submit' value='Submit'/>
		</div>
<?php 
	if($_POST["Submit"] == "Submit"){
	try
        {
                $pdo = connectPdo();

		$data = $pdo->query("SELECT * FROM Meals");
		$meals = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th>Food Name</th>";
		echo "<th>Calories</th>";
		echo "<th>Serving size (grams)</th>";
		echo "</tr>";
		// Get the data
		foreach($meals as $meal)
		{
			echo "<tr>";
			echo "<td>" . $meal["Food"] . "</td><td>" . 
			$meal["Calories"] . "</td><td>" . 
			$meal["Serving_Size"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
		echo "<h2 class=\"mt-3\">Here is the Food Database!</h2>";

	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
        }
	}
?>	

</form>
</div>
<div class="pt-5 mt-1 text-center">
<form action='#' method='POST'>
<h2 class="mb-3"> Add a Food to the Database </h2>

<p> Name of the food: <input type='text' name='foodName' required> </p>
<p> Calories of 100 grams of that food:  <input type='number' name='calories' required> </p>

<input type='submit' name='Submit2' value='Submit'>
<?php 
	if($_POST["Submit2"] == "Submit"){
	try
        {
                $pdo = connectPdo();
		$foodName = $_POST["foodName"];
		$calories = $_POST["calories"];

		$addFood = $pdo->prepare("INSERT INTO Meals VALUES('$foodName','$calories','100');");
		$addFood->execute();
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
	}
?>
</form>
</div>
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
