<!DOCTYPE html>
<html>
<head>
	<title>Heart Booking</title>
	<link rel="stylesheet" type="text/css" href="./css/appointment.css">
	<script type="text/javascript" src="./script.js"></script>
	<link rel="icon" href="./css/images/logo-ar-removebg-preview.png">
</head>
<body>
	<div class="container">
		<div class="logo"><img src="./css/images/logo-ar-removebg-preview.png"></div>
		<h1>Doctor Booking</h1>
		<p>يرجى ملء النموذج أدناه لحجز موعد</p>
		<form action="./Doctor-Appointment.php" method="post" onsubmit="return validateForm()">
			<label for="name">الاسم</label>
			<input type="text" id="name" name="name" placeholder="Your name.." required>

			<label for="email">البريد الالكتروني</label>
			<input type="text" id="email" name="email" placeholder="Your email.." required>

			<label for="phone">الهاتف</label>
			<input type="text" id="phone" name="phone" placeholder="Your phone.." required>

			<label for="doctor">الطبيب المعالج</label>
			<select id="doctor" name="doctor">
				<option value="">Select a doctor</option required>
                <option value="د. مينا سامي">د. مينا سامي</option>
                <option value="د. مريم علي">د. مريم علي </option>
                <option value="د. سمر احمد علي">د. سمر احمد علي</option>
                <option value="د. محمد تاج الدين">د. محمد تاج الدين</option>
                <option value="د. ابراهيم عيسي">د. ابراهيم عيسي</option>
                <option value="د. محمود سمير ">  د. محمود سمير  </option>
			</select>
			<label for="service">نوع الحجز</label>
			<select id="service" name="service">
				<option value="">Select a service</option required>
                <option value="حجز كشف - 500 جنيه">حجز كشف - 500 جنيه</option>
                <option value="حجز استشاره - 200 جنيه">حجز استشاره - 200 جنيه</option>
			</select>

			<label for="date">التاريخ </label>
			<input type="date" id="date" name="date">

			<label for="time">الوقت</label>
			<input type="time" id="time" name="time">
<br>
<br>
			<input type="submit" value="Book Appointment">
		</form>
	</div>


	<?php
include "./db_conn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $doctor = $_POST["doctor"];
    $service = $_POST["service"];
    $date = $_POST["date"];
    $time = $_POST["time"];


// Check if the appointment does not exist
$sql = "SELECT * FROM appointments WHERE name = '$name' AND email = '$email'  AND date = '$date'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<p style='color:red'>" . "عفواً هذه البيانات مسجلة من قبل .. حاول مجددًا." . "</p>";
} else {
    // Insert the appointment into the database
    $sql = "INSERT INTO appointments (name, email, phone, doctor, service, date, time) VALUES ('$name', '$email', '$phone', '$doctor', '$service', '$date', '$time')";
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:blue'>" . "تم الحجز بنجاح. سوف يتم التواصل معكم اذا حدث اي تغير." . "</p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

}

mysqli_close($conn);
?>

</body>
</html>
