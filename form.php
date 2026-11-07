<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> إدارة الطلاب</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li> <a href="form.php" class="active">إضافة طالب جديد</a></li>
                <li> <a href="StudentProfile.php">الملف الشخصي للطالب</a></li>
                <li> <a href="edit.php">تعديل بيانات الطالب</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hello">
            <h1> أهلا بك في صفحة إدارة الطلاب</h1>
        </section>
        <section class="contener">
            <h2 class="titel">إضافة طالب جديد</h2>
            <form action="form.php" method="post">
                <label for="name"> الاسم: </label>
                <input type="text" id="name" placeholder="اسمك باللغة العربية" name="name" required>
                <label for="age"> العمر: </label>
                <input type="number" id="age" placeholder="العمر" name="age" value="18" required>
                <label for="age"> المستوى التعليمي: </label>
                <input type="text" id="grade" placeholder="أي سنة بتدرس حاليا" name="grade" required>
                <label for="subjects"> المواد الدراسية: </label>
                <input type="text" id="subjects" placeholder="المواد الي منزلها" name="subjects" required>
                <label for="email"> الإيميل </label>
                <input type="email" id="email" placeholder="ايميلك الرسمي" name="email" required>
                <button type="submit" name="submit">إضافة</button>

            </form>


        </section>
    </main>

    <?php
    if (isset($_POST['submit'])) {


        $conn = mysqli_connect("localhost", "root", "", "student_db");

        if (!$conn) {
            die("فشل الاتصال: " . mysqli_connect_error());
        }




        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $subjects = $_POST['subjects'];
        $email = $_POST['email'];



        $sql = "INSERT INTO students (name, age, grade, subjects, email) 
                        VALUES ('$name', '$age', '$grade', '$subjects', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green;'> أنت الآن طالب في جامعة الأزهر </p>";
        } else {
            echo "<p style='color:red;'> حدث خطأ في العملية, الرجاء أعد المحاولة" . mysqli_error($conn) . "</p>";
        }


        mysqli_close($conn);
    }
    ?>


    <footer>
        <p>علياء يونس الدحدوح</p>
        <p>Alyaa Younis Aldahdouh</p>
        <p>الرقم الجامعي: 20240650</p>
    </footer>

</body>

</html>