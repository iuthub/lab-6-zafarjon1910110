<?php

$name = '';
$username = '';
$password = '';
$password_rep = '';
$date = '';
$postal = '';
$homePhone = '';
$mobilePhone = '';
$card = '';
$salary = '';
$website = '';
$gpa = '';

$isNameValid = true;
$isUserNameValid = true;
$isPasswordValid = true;
$isNewPasswordValid = true;
$isDateValid = true;
$isPostalValid = true;
$isHomePhoneValid = true;
$isMobilePhoneValid = true;
$isCardValid = true;
$isSalaryValid = true;
$isWebsiteValid = true;
$isGPAValid = true;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $password_rep = $_POST['ConfirmPassword'];
        $postal = $_POST['Postal'];
        $homePhone = $_POST['HomePhone'];
        $mobilePhone = $_POST['MobilePhone'];
        $card = $_POST['card'];
        $salary = $_POST['salary'];
        $gpa = $_POST['gpa'];

        $isNameValid = preg_match("/[A-Za-z]{2,}/", $name);
        $isUserNameValid = preg_match("/[A-Za-z]{5,}/", $password);
        $isPasswordValid = strlen($password) >= 8;
        $isNewPasswordValid = $password == $password_rep;
        $isPostalValid = preg_match('/\d{6}/', $postal);
        $isHomePhoneValid = preg_match('/\d{9}/', $homePhone);
        $isMobilePhoneValid = preg_match('/\d{9}/', $mobilePhone);
        $isCardValid = preg_match('/\d{16}/', $card);
        $isSalaryValid = preg_match('/UZS \d*,\d*\.\d{2}/', $salary);
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
    <form action="index.php" method="post">
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="Name" required> <span class="<?= $isNameValid? 'hidden-error' : 'error' ?>" > Error, name should be at least two characters long </span>
			</dd>
			
			<!-- Write other fields similar to Name as specified in lab6.pdf -->
            <dt>Email</dt>
            <dd>
                <input type="email" name="Email" required>
            </dd>

            <dt>Username</dt>
            <dd>
                <input type="text" name="Username" required><span class="<?= $isUserNameValid? 'hidden-error' : 'error' ?>"> Error, Username should be at least five characters long </span>
            </dd>

            <dt>Password</dt>
            <dd>
                <input type="password" name="Password" required> <span class="<?= $password? 'hidden-error' : 'error' ?>"> Error, password should be at least eight long </span>
            </dd>
            <dt>Confirm Password</dt>
            <dd>
                <input type="password" name="ConfirmPassword" required> <span class="<?= $isNewPasswordValid? 'hidden-error' : 'error' ?>"> Error, password should be equal to previous one </span>
            </dd>

            <dt>Date of Birth</dt>
            <dd>
                <input type="date" name="Date" required> <span class="<?= $isNewPasswordValid? 'hidden-error' : 'error' ?>"> Error, password should be equal characters to previous one </span>
            </dd>

            <dt>Gender</dt>
            <dd>
                <input type="radio" value="male" name="gender" checked> Male
                <input type="radio" value="female" name="gender"> Female
            </dd>

            <dt>Marital Status</dt>
            <dd>
                <input type="radio" value="single" name="marital" checked> Single
                <input type="radio" value="married" name="marital"> Married
                <input type="radio" value="divorced" name="marital"> Divorced
                <input type="radio" value="widowed" name="marital"> Widowed
            </dd>

            <dt>Address</dt>
            <dd>
                <input type="text" name="address" id="address" required>
            </dd>

            <dt>City</dt>
            <dd>
                <input type="text" name="city" id="city" required>
            </dd>

            <dt>Postal Code</dt>
            <dd>
                <input type="text" name="postal" id="postal" required>
            </dd>

            <dt>Home Phone</dt>
            <dd>
                <input type="text" name="homePhone" id="homePhone" required>
            </dd>

            <dt>Mobile Phone</dt>
            <dd>
                <input type="text" name="mobilePhone" id="mobilePhone" required>
            </dd>

            <dt>Credit Card</dt>
            <dd>
                <input type="text" name="card" id="card" required>
            </dd>

            <dt>Credit Card Expiry Date</dt>
            <dd>
                <input type="date" name="expiry" id="expiry" required>
            </dd>

            <dt>Monthly Salary</dt>
            <dd>
                <input type="text" name="salary" id="salary" required>
            </dd>

            <dt>Web Site URL</dt>
            <dd>
                <input type="url" name="url" id="url" required>
            </dd>

            <dt>Overall GPA/dt>
            <dd>
                <input type="text" name="gpa" id="gpa" required>
            </dd>
        </dl>
		
		<div>
			<input type="submit" value="Submit">
		</div>

    </form>
	</body>
</html>