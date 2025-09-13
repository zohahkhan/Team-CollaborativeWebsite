<?php
	if (!isset($userID)) {$userID = '';}
	if (!isset($salaryAmount)) {$salaryAmount = '';}
	if (!isset($hoursPerWeek)) {$hoursPerWeek = '';}
	if (!isset($daysPerWeek)) {$daysPerWeek = '';}
	if (!isset($vacationPerYear)) {$vacationPerYear = '';}
	if (!isset($holidaysPerYear)) {$holidaysPerYear = ''; }
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
		<?php if (!empty($error_message)) { ?>
			<p class="error"><?php echo htmlspecialchars($error_message); ?></p>
		<?php } ?>
		
        <form action= "display_results.php" method="get">

            <div id="data">
                <label>UserID:</label>
                <input type="text" name="userID" value= "<?php echo htmlspecialchars($userID); ?>"><br>

                <label>Salary Amount Per Hour:</label>
                <input type="text" name="salaryAmount" value= "<?php echo htmlspecialchars($salaryAmount); ?>"><br>

                <label>Hours Per Week:</label>
                <input type="text" name="hoursPerWeek" value= "<?php echo htmlspecialchars($hoursPerWeek); ?>"><br>
				
				<label>Days per Week:</label>
                <input type="text" name="daysPerWeek" value= "<?php echo htmlspecialchars($daysPerWeek); ?>"><br>
				
				<label>Vacation Days Per Year:</label>
                <input type="text" name="vacationPerYear" value= "<?php echo htmlspecialchars($vacationPerYear); ?>"><br>
				
				<label>Holidays Per Year:</label>
                <input type="text" name="holidaysPerYear" value= "<?php echo htmlspecialchars($holidaysPerYear); ?>"><br>
		
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate"><br>
            </div>

        </form>
    </main>
</body>
</html>