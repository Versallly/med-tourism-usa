<?php


/* Осуществляем проверку вводимых данных и их защиту от враждебных
скриптов */

$first_name = htmlspecialchars($_POST["first_name"]);

$last_name = htmlspecialchars($_POST["last_name"]);

$dob = htmlspecialchars($_POST["dob"]);

$ssn = htmlspecialchars($_POST["ssn"]);

$street_address = htmlspecialchars($_POST["street_address"]);

$city = htmlspecialchars($_POST["city"]);

$state = htmlspecialchars($_POST["state"]);

$zip = htmlspecialchars($_POST["zip"]);

$occupancy = htmlspecialchars($_POST["occupancy"]);

$years_at_address = htmlspecialchars($_POST["years_at_address"]);

$day_phone = htmlspecialchars($_POST["day_phone"]);

$evening_phone = htmlspecialchars($_POST["evening_phone"]);

$email = htmlspecialchars($_POST["email"]);

$employer = htmlspecialchars($_POST["employer"]);

$title = htmlspecialchars($_POST["title"]);

$work_address= htmlspecialchars($_POST["work_address"]);

$years_working = htmlspecialchars($_POST["years_working"]);

$vehicle = htmlspecialchars($_POST["vehicle"]);

$salesman = htmlspecialchars($_POST["salesman"]);

$annual_income = htmlspecialchars($_POST["annual_income"]);

$occupancy_payment = htmlspecialchars($_POST["occupancy_payment"]);

$work_phone = htmlspecialchars($_POST["work_phone"]);

/* Устанавливаем e-mail адресата
$myemail = "b_east@mail.ru";*/

/* Проверяем заполнены ли обязательные поля ввода, используя check_input
функцию */

$first_name = check_input($_POST["first_name"], "Put your First name!");
$last_name = check_input($_POST["last_name"], "Put your Last name!");
$dob = check_input($_POST["dob"], "Put your DOB!");
$ssn = check_input($_POST["ssn"], "Put your SSN!");
$street_address = check_input($_POST["street_address"], "Put your Street Address!");
$city = check_input($_POST["city"], "Put your city!");
$state = check_input($_POST["state"], "Put your State!");
$zip = check_input($_POST["zip"], "Put your ZIP!");
$occupancy = check_input($_POST["occupancy"], "Put your occupancy type!");
$years_at_address = check_input($_POST["years_at_address"], "Put how many years you live on your current address!!");
$day_phone = check_input($_POST["day_phone"], "Put your Daytime phone #!");
$evening_phone = check_input($_POST["evening_phone"], "Put your Evening phone #!");
$email = check_input($_POST["email"], "Put your Email!");
$employer= check_input($_POST["employer"], "Put your Employer!");
$title = check_input($_POST["title"], "Put your title!");
$work_address= check_input($_POST["work_address"], "Put your Working address!");
$years_working = check_input($_POST["years_working"], "Put how many years you are working on the !");
$vehicle = check_input($_POST["vehicle"], "Put what car are you interested in!");
$annual_income = check_input($_POST["annual_income"], "Put your annual income!");
$occupancy_payment = check_input($_POST["occupancy_payment"], "Put your occupancy payment!");
$work_phone = check_input($_POST["work_phone"], "Put your work phone!");


$message =

    "Personal info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "First Name: " . $first_name . "\r\n" .
    "Last Name: " . $last_name . "\r\n" .
    "Date of Birth: " . $dob . "\r\n" .
    "Social security number: " . $ssn . "\r\n" ."\r\n" .

    "Address info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Street address: " . $street_address . "\r\n" .
    "City: " . $city . "\r\n" .
    "state: " . $state . "\r\n" .
    "ZIP code: " . $zip . "\r\n" .
    "Occupancy: " . $occupancy . "\r\n" .
    "Occupancy payment: " . $occupancy_payment . "\r\n" .
    "Years at address: " . $years_at_address . "\r\n" . "\r\n" .

    "Contact info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Day phone #: " . $day_phone . "\r\n" .
    "Evening phone #: " . $evening_phone . "\r\n" .
    "Email: " . $email . "\r\n" . "\r\n" .

    "Working info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Employer: " . $employer . "\r\n" .
    "Title: " . $title . "\r\n" .
    "Annual income: " . $annual_income . "\r\n" .
    "Work address: " . $work_address . "\r\n" .
    "Work phone #: " . $work_phone . "\r\n" .
    "Years working for specific employer: " . $years_working . "\r\n" .
    "Car for lease: " . $vehicle . "\r\n" .
    "Salesman: " . $salesman . "\r\n";



$message = wordwrap($message, 70, "\r\n");


/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail address does not exist, check it please!");
}


/* Создаем новую переменную, присвоив ей значение
$message_to_myemail = "Hello  , $last_name!
Your contact information has been transmitted!
Our sales team will contact you soon!";*/


/* Отправляем сообщение, используя mail() функцию */
$from  = 'From: leasehp@gmail.com' . "\r\n" .
    'Reply-To: leasehp@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail('exoticmotorworldhp@gmail.com', $vehicle . " for " . $first_name . " " . $last_name, $message, $from);
?>
<p><?php echo $first_name ?></p>
<p>Your contact information has been transmitted!
    <br>
    Our sales team will contact you soon!</p>
<p><a href="index.php">Go to the main page >>></a></p>

<?php
/* Если при заполнении формы были допущены ошибки сработает
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Please fix this Error or contact our Tech Support (732-781-6661):</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>