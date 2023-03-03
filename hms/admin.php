<?php
include "./header.php";
include "db_conn.php";

// حذف صف إذا تم النقر على زر الحذف
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query = "DELETE FROM appointments WHERE id='$id'";
    $result = mysqli_query($conn,$query);
}

// استعراض بيانات المواعيد
$query = "SELECT * FROM appointments";
$result = mysqli_query($conn,$query);

if ($result){
    echo "<table>
            <tr>
                <th>الرقم</th>
                <th>إسم المريض</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>الطبيب المعالج</th>   
                <th>الخدمات</th>
                <th>التاريخ</th>
                <th>الوقت</th>
                <th>ملاحظات</th>
                <th>تاريخ الحجز</th>
                <th>حذف</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["doctor"]."</td>
                <td>".$row["service"]."</td>
                <td>".$row["date"]."</td>
                <td>".$row["time"]."</td>
                <td>".$row["notice"]."</td>
                <td>".$row["created_at"]."</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='id' value='".$row["id"]."'>
                        <input type='submit' name='delete' value='حذف'>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
}
else{
    echo "يوجد خطا ما";
}
?>

<a style='color:red' href="./admin-logout.php">تسجل الخروج</a>
