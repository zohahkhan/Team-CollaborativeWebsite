<?php
	//no error message
	$error_message = '';

    //get the data from the form - using filter_input
	$userID = filter_input(INPUT_GET, "userID");
	$salaryAmount = filter_input(INPUT_GET, "salaryAmount", FILTER_VALIDATE_FLOAT);
	$hoursPerWeek = filter_input(INPUT_GET, "hoursPerWeek", FILTER_VALIDATE_INT);
	$daysPerWeek = filter_input(INPUT_GET, "daysPerWeek", FILTER_VALIDATE_INT);
	$vacationPerYear = filter_input(INPUT_GET, "vacationPerYear", FILTER_VALIDATE_INT);
	$holidaysPerYear = filter_input(INPUT_GET, "holidaysPerYear", FILTER_VALIDATE_INT);

	 //validating: 
	 if($userID == FALSE) {
		$error_message = 'Please enter a valid User ID'; }
	else if($salaryAmount == FALSE) {
		$error_message = 'Please enter a valid Salary'; }
	else if($hoursPerWeek == FALSE) {
		$error_message = 'Please enter a valid number of hours'; }
	else if($hoursPerWeek > 80) {
		$error_message = 'The amount of hours cannot be more than 80';}
	else if($daysPerWeek == FALSE) {
		$error_message = 'Please enter a valid number of days';}
	else if($daysPerWeek > 7) {
		$error_message = 'The days per week cannot exceed 7';}
	else if($vacationPerYear == FALSE) {
		$error_message = 'Please enter a valid number of vacation days'; }
	else if($vacationPerYear > 260) {
		$error_message = 'The vacation days per year cannot exceed 260'; }
	else if($holidaysPerYear == FALSE) {
		$error_message = 'Please enter a valid number of holidays'; }
	else if($holidaysPerYear > 20) {
		$error_message = 'The number of holidays per year cannot be more that 20'; }
		
	if($error_message != ''){
		include('index.php');
		exit(); }
	 
	 //apply currency formatting to the dollar 
    $salaryAmountFormatted = "$".number_format($salaryAmount, 2);
	
	//using var_dump on all the variables
	var_dump($userID);
	var_dump($salaryAmount);
	var_dump($hoursPerWeek);
	var_dump($daysPerWeek);
	var_dump($vacationPerYear);
	var_dump($holidaysPerYear);
	
	//Part II: Unadjusted (or plain), Annual Salary, Daily Salary, and Hourly Salary
	$annualSalary = $salaryAmount*$hoursPerWeek*52;
	$dailySalary = $annualSalary/260;
	$daysWorkedPerYear = 260-($vacationPerYear + $holidaysPerYear); 
	$hoursWorkedPerDay = $hoursPerWeek/$daysPerWeek; 
	
	$adjAnnualSalary = $dailySalary*$daysWorkedPerYear; 
	$adjDailySalary = $adjAnnualSalary/260; 
	$adjHourlySalary = $adjDailySalary/$hoursWorkedPerDay; 
	
	//formatting
	$dailySalary_formatted = "$".number_format($dailySalary, 2);
	$annualSalary_formatted = "$".number_format($annualSalary, 2);
	$adjAnnualSalary_formatted = "$".number_format($adjAnnualSalary, 2);
	$adjDailySalary_formatted = "$".number_format($adjDailySalary, 2);
	$adjHourlySalary_formatted = "$".number_format($adjHourlySalary, 2);
	
	//var_dump 
	var_dump($annualSalary);
	var_dump($dailySalary);
	var_dump($daysWorkedPerYear);
	var_dump($hoursWorkedPerDay);
	var_dump($adjAnnualSalary);
	var_dump($adjDailySalary);
	var_dump($adjHourlySalary);
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Salary Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Salary Calculator</h1>

        <label>User ID: </label>
        <span><?php echo $userID; ?></span><br>

        <label>Hourly Salary Amount: </label>
        <span><?php echo $salaryAmountFormatted; ?></span><br>

        <label>Hours Per Week:</label>
        <span><?php echo $hoursPerWeek; ?></span><br>

        <label>Days Per Week:</label>
        <span><?php echo $daysPerWeek; ?></span><br>

        <label>Vacation Per Year:</label>
        <span><?php echo $vacationPerYear; ?></span><br>
		
		<label>Holidays Per Year:</label>
        <span><?php echo $holidaysPerYear; ?></span><br>
		
		<h1>Unadjusted and Adjusted:</h1>
		
		<label>Hourly:</label>
        <span><?php echo $salaryAmountFormatted, ", ", $adjHourlySalary_formatted; ?></span><br>
		
		<label>Daily:</label>
        <span><?php echo $dailySalary_formatted, ", ", $adjDailySalary_formatted; ?></span><br>
		
		<label>Annual:</label>
        <span><?php echo $annualSalary_formatted, ", ", $adjAnnualSalary_formatted; ?></span><br>
		
    </main>
</body>
</html>