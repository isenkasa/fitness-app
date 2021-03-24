<?php include './PHP/functions.php';
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
ID: 1 through 8</br>
Date: 2020-04-23

<form action='#' method='POST'>
<h2> Enter an Account ID and Date to See How Many Calories Were Consumed</h2>
<p> Enter ID: <input type='number' name='id' required></p>
<p> Enter date (YYYY-MM-DD): <input type='text' name='date' required> </p>

<input type='submit' name='Submit' value='Submit'>
<input type='reset' value='Reset'>
<?php 
	if($_POST["Submit"] == "Submit"){
	try
	{
		$pdo = connectPdo();
		
		// ************************************************** 
		// 1. Show how many calories a user consumed each day

		$id = $_POST["id"];
		$date = $_POST["date"];

		// Get the foods
		$data = $pdo->prepare("SELECT Food FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) = :date");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date" => $date));

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
		$data = $pdo->prepare("SELECT Servings_Consumed FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) = :date");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date" => $date));

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

		$calories_of_food;
		$totalCalories = 0;
		$counter = 0;
		for($i = 0; $i < count($foodsArray); $i++){
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
			echo "</br>";			
			echo "Calories of " . $servingsArray[$counter] . " serving(s) of " . $foodsArray[$counter] . " : " . $calories_of_food;
	
			$counter++;
			$totalCalories += $calories_of_food;
		}
		// Display total calories
		echo "</br>Total calories: " . $totalCalories;
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
<form action='#' method='POST'>
<h2> Enter an Account ID and Date to See How Many Calories Were Burned</h2>
<p> Enter ID: <input type='number' name='id' required> </p>
<p> Enter date: (YYYY-MM-DD): <input type='text' name='date' required> </p>


<input type='submit' name='Submit5' value='Submit'>
<input type='reset' value='Reset'>

<?php
	if($_POST['Submit5'] == "Submit"){
	try
	{
		// 2. Show how many calories a user has burned each day
		$pdo = connectPdo();

		$id = $_POST["id"];
		$date = $_POST["date"];

		$data = $pdo->prepare("SELECT Exercise FROM Performs_Workout WHERE A_ID = :id AND DATE(Date_Time) = :date");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date" => $date));

		$exercises = $data->fetchAll(PDO::FETCH_ASSOC);

		$exercisesArray = array();
		$counter = 0;
		foreach($exercises as $exercise)
		{
			$exercisesArray[$counter] = $exercise["Exercise"];
			$counter++;
		}

		$counter = 0;
		$caloriesBurned = 0;
		$totalCaloriesBurned = 0;
		for($x = 0; $x < count($exercisesArray); $x++)
		{
			$data = $pdo->prepare("SELECT Intensity FROM Workouts WHERE Exercise = :exercise");
                	if(!$data) {echo "Error in query!"; die();}
                	$data->execute(array(":exercise" => $exercisesArray[$counter]));

                	$calories = $data->fetchAll(PDO::FETCH_ASSOC);

			$caloriesVar;
			foreach($calories as $calorie)
			{
				$caloriesVar = $calorie["Intensity"];
			}

			$caloriesBurned = $caloriesVar;
			echo "</br>";

			echo "Burned " . $caloriesBurned . " calories by performing - " . $exercisesArray[$counter];
			
			$totalCaloriesBurned += $caloriesBurned;
			$counter++;
		}
		echo "</br>Total calories burned in " . $date . " is " . $totalCaloriesBurned;
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
<h2>Percentage of Diet Made Up of Each Macro </h2>

<form action='#' method='POST'>
<p> Enter ID:  <input type='number' name='id' required> </p>
<p> Enter date (YYYY-MM-DD): <input type='text' name='date' required> </p>

<input type='submit' name='Submit3' value='Submit'>
<input type='reset' value='Reset'>
<?php
	if($_POST["Submit3"] == "Submit"){
	try
        {
                $pdo = connectPdo();

		$id = $_POST["id"];
		$date = $_POST["date"];

		// Get the foods
		$data = $pdo->prepare("SELECT Food FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) = :date");
		if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date" => $date));

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
		$data = $pdo->prepare("SELECT Servings_Consumed FROM Consumes_Meal WHERE A_ID = :id AND DATE(Date_Time) = :date");
                if(!$data) {echo "Error in query!"; die();}
                $data->execute(array(":id" => $id, ":date" => $date));

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

		if($totalMacros != 0)
		{
			echo "Your Macros are composed as follows: " . "</br>";
			echo "Carbohydrates: " . round(($totalCarbs / $totalMacros)*100) . "%" . "</br>";
			echo "Protein: " . round(($totalProtein / $totalMacros)*100) . "%" . "</br>";
			echo "Fat: " . round(($totalFat / $totalMacros)*100) . "%" . "</br>";
		}

		if($totalMicros != 0)
		{
			echo "</br>";
			echo "Your Micros are composed as follows: " . "</br>";
               		echo "Vitamin D: " . round(($totalVitD / $totalMicros)*100) . "%" . "</br>";
			echo "Vitamin C: " . round(($totalVitC / $totalMicros)*100) . "%" . "</br>";
			echo "Calcium: " . round(($totalCalcium / $totalMicros)*100) . "%" . "</br>";
			echo "Sodium: " . round(($totalSodium / $totalMicros)*100) . "%" . "</br>";
			echo "Potassium: " . round(($totalPotassium / $totalMicros)*100) . "%" . "</br>";
		}

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
		echo "You have consumed " . round(($totalCarbs/$carbsRec)*100) . "% of the Recommended Carbohydrate intake";

		echo "</br>";
                //echo "Recommended Protein intake: " $proteinRec;
		echo "You have consumed " . round(($totalProtein/$proteinRec)*100) . "% of the Recommended Protein intake";

		echo "</br>";
                //echo $fatRec;
		echo "You have consumed " . round(($totalFat/$fatRec)*100) . "% of the Recommended Fat intake";

		echo "</br>";
                //echo $vitDRec;
		echo "You have consumed " . round(($totalVitD/$vitDRec)*100) . "% of the Recommended Vitamin D intake";

		echo "</br>";
                //echo $vitCRec;
		echo "You have consumed " . round(($totalVitC/$vitCRec)*100) . "% of the Recommended Vitamin C intake";
	
		echo "</br>";
                //echo $calciumRec;
		echo "You have consumed " . round(($totalCalcium/$calciumRec)*100) . "% of the Recommended Calcium intake";

		echo "</br>";
                //echo $sodiumRec;
		echo "You have consumed " . round(($totalSodium/$sodiumRec)*100) . "% of the Recommended Sodium intake";

		echo "</br>";
                //echo $potassiumRec;
		echo "You have consumed " . round(($totalPotassium/$potassiumRec)*100) . "% of the Recommended Potassium intake";
	}
	catch(PDOexception $e)
        {
                echo "Connection to database failed: " . $e->getMessage();
	}
}
?>
</form>


</div>
</body>
<footer class="footer">
	<div class="container">
		<div class="row pt-5">
			<div class="col-sm text-white"> Contact: 1-800-123-4567</div>
			<div class="col-5"></div> 
			<div class="col-sm text-white"> CSCI Homies </div>
		</div>
	</div>
</footer>
 
</html>
