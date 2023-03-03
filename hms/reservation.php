<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation</title>
    <link rel="stylesheet" href="./css/reservation.css">
    <link rel="icon" href="./css/images/logo-ar-removebg-preview.png">
</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="./css/images/logo-ar-removebg-preview.png">
            <h2>مركز مجدي يعقوب للقلب</h2>
        </div>
        <div class="book">
            <p>اهلا بك في مركز مجدي يعقوب للقلب ,, للحجز املئ هذه الإستمارة</p>

            <form action="reservation.php" method="post">
            <label for="service">أختر الخدمه:</label>
            <select id="service" name="service">
                <option value="">Select service</option required>
                <option value="حجز كشف - 500 جنيه"> رسم كهربي للقلب - 500 جنيه</option>
                <option value="رسم قلب - 300 جنيه">رسم قلب - 300 جنيه</option>
                <option value="اشعه دوبليكس علي الشراين - 2000 جنيه">اشعه دوبليكس علي الشراين - 2000 جنيه</option>
                <option value="اشعه رنين مغناطيسي - 700 جنيه">اشعه رنين مغناطيسي - 700 جنيه</option>
                <option value="معمل التحاليل الطبيه">معمل التحاليل الطبيه</option>
            </select>
            <br>
            <label for="doctor">اختر طبيبك المعالج:</label>
            <select id="doctor" name="doctor" required>
                <option value="">Select doctor</option>
                <option value="د. مينا سامي">د. مينا سامي</option>
                <option value="د. سمر احمد علي">د. سمر احمد علي</option>
                <option value="د. مريم علي">د. مريم علي</option>
                <option value="د. محمد تاج الدين">د. محمد تاج الدين</option>
                <option value="د. ابراهيم عيسي">د. ابراهيم عيسي</option>
                <option value="د. محمود سمير ">  د. محمود سمير  </option>
            </select>
            <br>
            <label for="date">ادخل الوقت و التاريخ:</label>
            <input type="datetime-local" id="date" name="date" required>
            <br>
            <label for="name">ادخل الاسم:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">ادخل البريد الالكتروني:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="phone">ادخل رقم الهاتف:</label>
            <input type="tel" id="phone" name="phone" required>
            <br>
            <label for="notice">اضف ملاحظاتك:</label>
            <input type="text" name="notice" />
            <br>
            <input type="submit" value="Submit">
        </form>
        <a style='color:red' href="./user-logout.php">تسجل الخروج</a>
    
        <?php
include "db_conn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form data
    $service = $_POST["service"];
    $doctor = $_POST["doctor"];
    $date = $_POST["date"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $notice = $_POST["notice"];

        // get the appointments details from the form
        $appointments_time = $_POST['date'];

        // check if the appointments time is valid (not on Friday and between 8am and 10pm)
        $timestamp = strtotime($appointments_time);
        $day = date('l', $timestamp);
        $hour = date('H', $timestamp);
        if ($day == 'Friday' || $hour < 8 || $hour >= 22) {
            echo "عفوا هذا الميعاد غير متاح يرجي اختيار ميعاد من الساعه الثامنه صباحا حتي العاشره مسائا جميع ايام الاسبوع ماعدا يوم الجمعه";
            exit;
        }

    // Check if the appointments already exists
    $sql = "SELECT * FROM appointments WHERE name = '$name' AND date = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red'>" . "عفواً هذه البينات مسجله من قبل .. حاول مجدد " . "</p>";
    } else {
        // Insert the reservation into the database
        $sql = "INSERT INTO appointments (service, doctor, date, name, email, phone, notice) VALUES ('$service', '$doctor', '$date', '$name', '$email', '$phone', '$notice')";
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green'>" . "تم الحجز بنجاح. سوف يتم التواصل معكم اذا حدث اي تغير." . "</p>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

        </div>
    </div>
</body>
</html>