<?php


/* Осуществляем проверку вводимых данных и их защиту от враждебных
скриптов */

$first_name = htmlspecialchars($_POST["first_name"]);
$dob = htmlspecialchars($_POST["dob"]);
$contact = htmlspecialchars($_POST["contact"]);
$email = htmlspecialchars($_POST["email"]);
$sex = htmlspecialchars($_POST["sex"]);
$country = htmlspecialchars($_POST["country"]);
$diagnose = htmlspecialchars($_POST["diagnose"]);
$reference = htmlspecialchars($_POST["reference"]);
$history = htmlspecialchars($_POST["history"]);


/* Устанавливаем e-mail адресата
$myemail = "b_east@mail.ru";*/

/* Проверяем заполнены ли обязательные поля ввода, используя check_input
функцию */

$first_name = check_input($_POST["first_name"], "Put your First name!");
$country = check_input($_POST["country"], "Put your Last name!");
$dob = check_input($_POST["dob"], "Put your DOB!");
$sex = check_input($_POST["sex"], "Put your sex!");
$email = check_input($_POST["email"], "Put your Email!");
$diagnose = check_input($_POST["diagnose"], "Put your diagnose!");

$message =

    "Personal info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Name: " . $first_name . "\r\n" .
    "Country: " . $country . "\r\n" .
    "Date of Birth: " . $dob . "\r\n" .
    "Sex: " . $sex . "\r\n" .
    "Diagnose: " . $diagnose . "\r\n" .
    "Medical history: " . $history . "\r\n" .
    "Contact: " . $contact . "\r\n" .
    "Email: " . $email . "\r\n" . "\r\n" .
    "Reference" . $reference . "\r\n";



$message = wordwrap($message, 70, "\r\n");


/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail address does not exist, check it please!");
}


/* Создаем новую переменную, присвоив ей значение
$message_to_myemail = "Hello  , $first_name!
Your contact information has been transmitted!
Our sales team will contact you soon!";*/


/* Отправляем сообщение, используя mail() функцию */
$from  = 'From: med-turizm-usa@yandex.ru' . "\r\n" .
    'Reply-To: med-turizm-usa@yandex.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail('med-turizm-usa@yandex.ru', $dob . " for " . $first_name . " " . $country, $message, $from);
?>
<p><?php echo $first_name ?></p>
<p>Your contact information has been transmitted!
    <br>
    Our sales team will contact you soon!</p>
<p><a href="index.html">Go to the main page >>></a></p>

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