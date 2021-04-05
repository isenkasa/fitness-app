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
<div class="container">
Testing examples:</br>
ID: 1 through 8
<h2 class="pt-3 pb-2">Select an Exercise to be Added</h2>
<form action='#' method='POST'>
<?php
        try
        {
                $pdo = connectPdo();
                $data = $pdo->query("SELECT Exercise FROM Workouts;");
                $exercises = $data->fetchAll(PDO::FETCH_ASSOC);

                $val = array();
                $counter = 0;
                foreach($exercises as $exercise)
                {
                        $val[$counter] = $exercise["Exercise"];
                        $counter++;
                }

                $size = count($val);

		for($x = 0; $x < $size; $x++)
                {
                        $text = $val[$x];
			echo "<h4 class=\"pb-3\">";
			echo $text." ";
			echo "<input type='radio' name='radio1' value='$text' required>";
			echo "</h4>";
		}
     	    }
        catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
        }
?>

Enter ID: <input type='text' name='id'required> 
<input type='submit' name='Submit' value='Submit'>
<input type='reset' value='Reset'>
</form>
</div>
<?php if($_POST["Submit"] == "Submit"){
	try
        {
                $pdo = connectPdo();

		$id = $_POST["id"];
                $exercise = $_POST["radio1"];
                $date = date("Y-m-d") . " " . date("H-i-s");

                $addExercise = $pdo->prepare("INSERT INTO Performs_Workout VALUES('$id','$exercise','$date');");
                $addExercise->execute();

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
