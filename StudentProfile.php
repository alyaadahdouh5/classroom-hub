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
                <li> <a href="form.php">إضافة طالب جديد</a></li>
                <li> <a href="StudentProfile.php" class="active">الملف الشخصي للطالب</a></li>
                <li> <a href="edit.php">تعديل بيانات الطالب</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hello">
            <h1> أهلا بك في صفحة إدارة الطلاب</h1>
        </section>
        <section class="contener">
            <h2 class="titel">إدارة الطلاب</h2>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "student_db");

            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                mysqli_query($conn, "DELETE FROM students WHERE id=$id");
                header("Location: StudentProfile.php");
                exit();
            }

            mysqli_close($conn);
            ?>

            <div>
                <form action="StudentProfile.php" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="ابحث بالاسم...">
                    <button type="submit">هاتلي اياه من أذنه </button>
                </form>
            </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>العمر</th>
                        <th>الصف</th>
                        <th>المواد</th>
                        <th>الإيميل</th>
                        <th>إجراءات</th>
                    </tr>
                    <?php

                    $conn = mysqli_connect("localhost", "root", "", "student_db");

                    if (!$conn) {
                        die("جرب ثاني: " . mysqli_connect_error());
                    }


                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM students WHERE name LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM students";
                    }
                    $result = mysqli_query($conn, $sql);


                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['grade'] . "</td>";
                        echo "<td>" . $row['subjects'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>
            <a href='edit.php?id=" . $row['id'] . "'> تعديل بيانات الطالب</a> | 
           <a href='StudentProfile.php?delete=" . $row['id'] . "' onclick='return confirm(\"هل أنت متأكد من حذف الطالب؟\")'>حذف الطالب</a>
            </td>";
                        echo "</tr>";
                    }

                    mysqli_close($conn);
                    ?>

                </table>
            </div>
        </section>
    </main>


    <footer>
        <p>علياء يونس الدحدوح</p>
        <p>Alyaa Younis Aldahdouh</p>
        <p>الرقم الجامعي: 20240650</p>

    </footer>

</body>

</html>