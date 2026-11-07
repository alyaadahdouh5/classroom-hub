<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الطلاب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="form.php">إضافة طالب جديد</a></li>
                <li><a href="StudentProfile.php">الملف الشخصي للطالب</a></li>
                <li><a href="edit.php" class="active">تعديل بيانات الطالب</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hello">
            <h1> أهلا بك في صفحة إدارة الطلاب</h1>
        </section>
        
        <section class="contener">
            <h2 class="titel">تعديل بيانات الطالب</h2>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "student_db");
            if (!$conn) {
                die("فشل الاتصال: " . mysqli_connect_error());
            }

            
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                echo "<div style='text-align:center; padding:50px;'>
                        <h2 style='color:#e67e22;'>اختار طالب بالأول</h2>
                        <p>عشان تقدر تعدل بيانات ارجع لصفحة الطلاب واختارلك طالب</p>
                        <a href='StudentProfile.php' style='display:inline-block; margin-top:20px; padding:10px 20px; background:#1abc9c; color:#fff; border-radius:5px;'>قائمة الطلاب</a>
                      </div>";
            } else {
                $id = $_GET['id'];

                
                if (isset($_POST['update'])) {
                    $new_id = $_POST['id'];
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $grade = $_POST['grade'];
                    $subjects = $_POST['subjects'];
                    $email = $_POST['email'];

                    $sql = "UPDATE students SET 
                            id='$new_id',
                            name='$name', 
                            age='$age', 
                            grade='$grade', 
                            subjects='$subjects', 
                            email='$email' 
                            WHERE id=$id";

                    if (mysqli_query($conn, $sql)) {
                        header("Location: StudentProfile.php");
                        exit();
                    } else {
                        echo "<p style='color:red;'>❌ خطأ: " . mysqli_error($conn) . "</p>";
                    }
                }

               
                $sql = "SELECT * FROM students WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>

            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" value="<?php echo $row['id']; ?>" required>

                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

                <label for="age">العمر:</label>
                <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>

                <label for="grade">المستوى التعليمي:</label>
                <input type="text" id="grade" name="grade" value="<?php echo $row['grade']; ?>" required>

                <label for="subjects">المواد الدراسية:</label>
                <input type="text" id="subjects" name="subjects" value="<?php echo $row['subjects']; ?>">

                <label for="email">الإيميل:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

                <button type="submit" name="update">تحديث</button>
            </form>

            <?php
            }
            mysqli_close($conn);
            ?>
        </section>
    </main>

    <footer>
        <p>علياء يونس الدحدوح</p>
        <p>Alyaa Younis Aldahdouh</p>
        <p>الرقم الجامعي: 20240650</p>
    </footer>
</body>
</html>