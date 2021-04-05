<?php include'./functions.php';
error_reporting(0);
?>		
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
                            <a class="nav-link active " href="Menu.html">Menu</a>
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
Date: 2020-04-23
<h2>Show Food That Users Consumed Over a Period of Time</h2>
<h2>Inlcudes Calories, Nutrients, and Other Important Information</h2>

<h3 class="pt-3"> Show Table </h3>

<form action='#' method='POST'>

<p> Enter ID: <input type='number' name='id'required> </p>
<p> Enter Start Date (YYYY-MM-DD): <input type='text' name='date1'required> </p>
<p> Enter End Date (Use Different Dates): <input type='text' name='date2' required> </p>
<input type='submit' name='Submit1' value='Submit'>
<input type='reset' value='Reset'>
</form>
<?php 
	if($_POST["Submit1"] == "Submit"){
	try
        {
                $pdo = connectPdo();

		/*
		***********************************************************************************************
							SHOW THE TABLE
		 */
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
                        </form> 
		     </th>";
		echo "</tr>";
		// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
//SHOw TABLE ASCENDING FOR FOODS	
	if($_POST["AscendFood"] == "Food Name"){
	try
        {
                $pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Food ASC");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='DescendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
                        </form> 
		     </th>";
		echo "</tr>";
		// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE DESCENDING FOR FOODS	
	if($_POST["DescendFood"] == "Food Name"){
	try
        {
                $pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Food DESC");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
                        </form> 
		     </th>";
		echo "</tr>";
		// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}


//SHOW TABLE ASCENDING FOR SERVINGS
	if($_POST["AscendServings"] == "Servings Consumed"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Servings_Consumed ASC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";	
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='DescendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
                        </form> 
		     </th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
	}
//SHOW TABLE DESCENDING FOR  SERVINGS	
        if($_POST["DescendServings"] == "Servings Consumed"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Servings_Consumed DESC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			</form> 
 	  	     </th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE ASCENDING FOR CALORIES
	if($_POST["AscendCalories"] == "Calories"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Calories ASC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='DescendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			</form> 
 	  	     </th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE DESCENDING FOR CALORIES
	if($_POST["DescendCalories"] == "Calories"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Calories DESC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			</form> 
 	  	     </th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE ASCENDING FOR NUTRIENTS
	if($_POST["AscendNutrients"] == "Nutrients"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Nutrient ASC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='DescendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			</form> 
 	  	     </th>";
		echo "</tr>";

			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE DESCENDING FOR NUTRIENTS
	if($_POST["DescendNutrients"] == "Nutrients"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Nutrient DESC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			</form> 
 	  	     </th>";
		echo "</tr>";

			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE ASCENDING FOR AMOUNT
	if($_POST["AscendAmount"] == "Amounts"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Amount ASC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='DescendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
		     </form>
			</th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}	//SHOW TABLE DESCENDING FOR AMOUNTS
	if($_POST["DescendAmount"] == "Amounts"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Amount DESC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			   <input type='submit' name='AscendDateAndTime' value='Date and Time'>
                           <input type='hidden' name='id' value='".$id."'>
			   <input type='hidden' name='date1' value='".$date1."'>
			   <input type='hidden' name='date2' value='".$date2."'>
			 </form>
		   	</th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE ASCENDING FOR DATE AND TIME
	if($_POST["AscendDateAndTime"] == "Date and Time"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Date_Time ASC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='DescendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			 </form>
		   	</th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
	//SHOW TABLE DESCENDING FOR DATE AND TIME
	if($_POST["DescendDateAndTime"] == "Date and Time"){
	try
	{
		$pdo = connectPdo();
		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$data = $pdo->prepare("SELECT cons.Food,cons.Servings_Consumed,meal.Calories,cont.Nutrient,cont.Amount,cons.Date_Time FROM Accounts acc, Consumes_Meal cons, Meals meal, Meal_Contains cont WHERE acc.A_ID=cons.A_ID AND cons.Food=cont.Food AND cons.Food=meal.Food AND acc.A_ID=:id AND cons.Date_Time BETWEEN :date1 AND :date2 ORDER BY Date_Time DESC;");
		
		if(!$data) {echo "Error in query!"; die();}

		$data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));
		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "<table border=1 cellspacing=1 align='center'>";
		// Create the Headers
		echo "<tr>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendFood' value='Food Name'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";

		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendServings' value='Servings Consumed'>
			<input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			   </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendCalories' value='Calories'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendNutrients' value='Nutrients'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
		          </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			  <input type='submit' name='AscendAmount' value='Amounts'>
			  <input type='hidden' name='id' value='".$id."'>
			  <input type='hidden' name='date1' value='".$date1."'>
			  <input type='hidden' name='date2' value='".$date2."'>
			  </form>
		     </th>";
		echo "<th><form action='#' method='POST'>
			<input type='submit' name='AscendDateAndTime' value='Date and Time'>
                        <input type='hidden' name='id' value='".$id."'>
			<input type='hidden' name='date1' value='".$date1."'>
			<input type='hidden' name='date2' value='".$date2."'>
			 </form>
		      </th>";
		echo "</tr>";
			// Get the data
		foreach($foods as $food)
		{
			echo "<tr>";
			echo "<td>" . $food["Food"] . "</td><td>" . 
			$food["Servings_Consumed"] . "</td><td>" . 
			$food["Calories"] . "</td><td>" .
			$food["Nutrient"] . "</td><td>" .
			$food["Amount"] . "</td><td>" .
			$food["Date_Time"] . "</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
?>


</div>

<div class="container">
<h3> Count Calories Consmed Over Time </h3>

<form action='#' method='POST'>

<p> Enter ID: <input type='number' name='id'> </p>
<p> Enter Start Date (YYYY-MM-DD): <input type='text' name='date1'> </p>
<p> Enter End Date (Use Different Dates): <input type='text' name='date2'> </p>

<input type='submit' name='Submit2' value='Submit'>
<input type='reset' value='Reset'>
<?php
	if($_POST["Submit2"] == "Submit"){
	try
	{
		$pdo = connectPdo();
		
		// ************************************************** 
		//  Show how many calories a user consumed each day

		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];

		// Get the foods
		$data = $pdo->prepare("SELECT Food FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) BETWEEN :date1 AND :date2;");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));

		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		// Store the foods in array		
		$foodsArray = array();
		$counter = 0;
		foreach($foods as $food)
		{
			$foodsArray[$counter] = $food["Food"];
			$counter++;
		}
		
		// Get the servings consumed by user
		$data = $pdo->prepare("SELECT Servings_Consumed FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) BETWEEN :date1 AND :date2;");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));

		$servings = $data->fetchAll(PDO::FETCH_ASSOC);

		// Store the servings in associative array
		$servingsArray = array();
		$counter = 0;
		foreach($servings as $serving)
		{
			$servingsArray[$counter] = $serving["Servings_Consumed"];
			$counter++;
		}

		// Calculate calories of specific food (food calories * servings)
		// And calculate total calories

		echo "</br>Here is the breakdown of the calorie consumption for user ID: " . $id . " - Between " . $date1 . " and " . $date2 . ":</br> ";

		$calories_of_food;
		$totalCalories = 0;
		$counter = 0;
		for($i = 0; $i < count($foodsArray); $i++)
		{
			// Get the calories
			$data = $pdo->prepare("SELECT Calories FROM Meals WHERE Food = :food");
			if(!$data) {echo "Error in query!"; die();}
			$data->execute(array(":food" => $foodsArray[$counter]));

			$calories = $data->fetchAll(PDO::FETCH_ASSOC);
			
			// Store the calories into caloriesVar
			$caloriesVar;
			foreach($calories as $calorie)
			{
				$caloriesVar = $calorie["Calories"];
			}
	
			$calories_of_food = $caloriesVar * $servingsArray[$counter];
			echo "Calories of " . $servingsArray[$counter] . " serving(s) of " . $foodsArray[$counter] . " : " . $calories_of_food;
			echo "</br>";
	
			$counter++;
			$totalCalories += $calories_of_food;
		}
		// Display total calories
		echo "Total calories: " . $totalCalories;
	}
	catch(PDOexception $e)
	{
		echo "Connection to database failed: " . $e->getMessage();
	}
}
?>

</form>
</div>

<!--Counting Marcos-->
<div class="container">
<h3> Count Macros Consumed Over Time </h3>

<form action='#' method='POST'>

<p> Enter ID: <input type='number' name='id'> </p>
<p> Enter Start Date (YYYY-MM-DD): <input type='text' name='date1'> </p>
<p> Enter End Date (Use Different Dates): <input type='text' name='date2'> </p>

<input type='submit' name='Submit3' value='Submit'>
<input type='reset' value='Reset'>
<?php
	if($_POST["Submit3"] == "Submit"){
	try
        {
                $pdo = connectPdo();

		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];

		// Get the foods
		$data = $pdo->prepare("SELECT Food FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) BETWEEN :date1 AND :date2");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));

		$foods = $data->fetchAll(PDO::FETCH_ASSOC);

		// Store the foods in array		
		$foodsArray = array();
		$counter = 0;
		foreach($foods as $food)
		{
			$foodsArray[$counter] = $food["Food"];
			$counter++;
		}
		
		// Get the servings consumed by user
		$data = $pdo->prepare("SELECT Servings_Consumed FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) BETWEEN :date1 AND :date2");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));

		$servings = $data->fetchAll(PDO::FETCH_ASSOC);

		// Store the servings in associative array
		$servingsArray = array();
		$counter = 0;
		foreach($servings as $serving)
		{
			$servingsArray[$counter] = $serving["Servings_Consumed"];
			$counter++;
		}

		$totalCarbs = 0;
		$totalProtein = 0;
		$totalFat = 0;
		$totalVitD = 0;
		$totalVitC = 0;
		$totalCalcium = 0;
		$totalSodium = 0;
		$totalPotassium = 0;

		$totalMacros = 0;
		$totalMicros = 0;

		$counter = 0;

		for($i = 0; $i < count($foodsArray); $i++)
		{
			// Get the nutrients
			$data = $pdo->prepare("SELECT * FROM Meal_Contains WHERE Food = :food");
			if(!$data) {echo "Error in query!"; die();}
			$data->execute(array(":food" => $foodsArray[$counter]));

			$nutrients = $data->fetchAll(PDO::FETCH_ASSOC);

			foreach($nutrients as $nutrient)
			{
				if($nutrient["Nutrient"]=="Carbohydrate")
				{
					$totalCarbs += $nutrient["Amount"] * $servingsArray[$counter];
					$totalMacros += $nutrient["Amount"] * $servingsArray[$counter];
				}

				if($nutrient["Nutrient"]=="Protein")
                                {
                                        $totalProtein += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMacros += $nutrient["Amount"] * $servingsArray[$counter];
                                }

				if($nutrient["Nutrient"]=="Fat")
                                {
                                        $totalFat += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMacros += $nutrient["Amount"] * $servingsArray[$counter];
                                }
				
				if($nutrient["Nutrient"]=="Vitamin D")
                                {
                                        $totalVitD += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMicros += $nutrient["Amount"] * $servingsArray[$counter];
                                }

				if($nutrient["Nutrient"]=="Vitamin C")
                                {
                                        $totalVitC += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMicros += $nutrient["Amount"] * $servingsArray[$counter];
                                }

				if($nutrient["Nutrient"]=="Calcium")
{
                                        $totalCalcium += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMicros += $nutrient["Amount"] * $servingsArray[$counter];
                                }

				if($nutrient["Nutrient"]=="Sodium")
                                {
                                        $totalSodium += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMicros += $nutrient["Amount"] * $servingsArray[$counter];
                                }

				if($nutrient["Nutrient"]=="Potassium")
                                {
                                        $totalPotassium += $nutrient["Amount"] * $servingsArray[$counter];
                                        $totalMicros += $nutrient["Amount"] * $servingsArray[$counter];
                                }
			}
			$counter++;
		}

		// Display amounts
		echo "</br>Total Carbohydrates: " . $totalCarbs . " grams" . "</br>";
                echo "Total Protein: " . $totalProtein . " grams" . "</br>";
                echo "Total Fat: " . $totalFat . " grams" . "</br>";
                echo "Total Vitamin D: " . $totalVitD . " micrograms" . "</br>";
                echo "Total Vitamin C: " . $totalVitC . " micrograms" . "</br>";
                echo "Total Calcium: " . $totalCalcium . " micrograms" . "</br>";
                echo "Total Sodium: " . $totalSodium . " micrograms" . "</br>";
                echo "Total Potassium: " . $totalPotassium . " micrograms" . "</br>";

		echo "</br>";
                echo "Total Macros: " . $totalMacros . " grams" . "</br>";
                echo "Total Micros: " . $totalMicros . " micrograms" . "</br>";
		echo "</br>";	

		// GET RECOMMENDED AMOUNTS

		$carbsRec = 0;
                $proteinRec = 0;
                $fatRec = 0;
                $vitDRec = 0;
                $vitCRec = 0;
                $calciumRec = 0;
                $sodiumRec = 0;
                $potassiumRec = 0;

		// Carbs
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Carbohydrate';");
		if(!$data) {echo "Error in query!"; die();}
		$data->execute();
	
		$amounts = $data->fetchAll(PDO::FETCH_ASSOC);
		foreach($amounts as $amount)
		{
			$carbsRec = $amount["Recommended_Amount"];
		}

		// Protein
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Protein';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $proteinRec = $amount["Recommended_Amount"];
                }

		// Fat
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Fat';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $fatRec = $amount["Recommended_Amount"];
                }

		// Vit D
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Vitamin D';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $vitDRec = $amount["Recommended_Amount"];
                }

		// Vit C
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Vitamin C';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $vitCRec = $amount["Recommended_Amount"];
		}
	
		// Calcium
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Calcium';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $calciumRec = $amount["Recommended_Amount"];
                }

		// Sodium
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Sodium';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $sodiumRec = $amount["Recommended_Amount"];
                }

		// Potassium
		$data = $pdo->prepare("SELECT Recommended_Amount FROM Nutrients WHERE Nutrient = 'Potassium';");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute();

                $amounts = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($amounts as $amount)
                {
                        $potassiumRec = $amount["Recommended_Amount"];
                }

		echo "</br>";
		echo "Recommended Daily Carbohydrate intake: " . $carbsRec . " grams";

		echo "</br>";
                echo "Recommended Daily Protein intake: " . $proteinRec . " grams";

		echo "</br>";
                echo "Recommended Daily Fat intake: " . $fatRec . " grams";

		//$vitDRec;
		echo "</br>";
                echo "Recommended Daily Vitamin D intake: " . $vitDRec . " micrograms";

                //$vitCRec;
		echo "</br>";
		echo "Recommended Daily Vitamin C intake: " . $vitCRec . " micrograms";
		
	       	//$calciumRec;
		echo "</br>";
                echo "Recommended Daily Calcium intake: " . $calciumRec . " micrograms";

                //$sodiumRec;
		echo "</br>";
                echo "Recommended Daily Sodium intake: " . $sodiumRec . " micrograms";

                //$potassiumRec;
		echo "</br>";
                echo "Recommended Daily Potassium intake: " . $potassiumRec . " micrograms";
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}

?>


</form>
</div>
<div class="container">
<h3>Show User's Weight Over a Time Period</h3>

<form action='#' method='POST'>

<p> Enter ID: <input type='number' name='id'> </p>
<p> Enter Start Date (YYYY-MM-DD): <input type='text' name='date1'> </p>
<p> Enter End Date (Use different dates): <input type='text' name='date2'> </p>

<input type='submit' name='Submit4' value='Submit'>
<input type='reset' value='Reset'>

<?php 
	if($_POST['Submit4'] == "Submit"){
	try
	{
		$pdo = connectPdo();

		$id = $_POST["id"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];

		$data = $pdo->prepare("SELECT * FROM Records_Weight WHERE A_ID = :id AND DATE(Date_Time) BETWEEN :date1 AND :date2;");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date1" => $date1, ":date2" => $date2));

		$infos = $data->fetchAll(PDO::FETCH_ASSOC);

		echo "</br>User: " . $id;
		echo "</br>";
		echo "Weight over time: ";
		echo "</br>";

		foreach($infos as $info)
		{
			echo $info["Date_Time"] . " - " . $info["Pounds"] . " Pounds ";
			echo "</br>";
		}
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
