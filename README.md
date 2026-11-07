# Classroom Hub 🎓 | نظام إدارة الطلاب

تطبيق ويب سريع وبسيط مبني باستخدام PHP و MySQL ، هدفه تسهيل إدارة بيانات الطلاب من قبل المعلمين، بواجهة عربية بسيطة (RTL).

# المميزات (Features)

- ضافة طالب جديد (`form.php`)**: تسجيل طالب جديد (الاسم، العمر، المستوى التعليمي، المواد، الإيميل).
- إدارة الطلاب والملف الشخصي (`StudentProfile.php`)**: عرض جميع الطلاب في جدول منسق، مع إمكانية البحث بالاسم، وحذف الطالب.
- تعديل البيانات (`edit.php`)**: تحديث بيانات أي طالب بناءً على الـ ID الخاص به.
- التوجيه التلقائي (`index.php`)**: تحويل المستخدم تلقائياً للصفحة الرئيسية.
- تصميم متجاوب (`style.css`)**: واجهة مستخدم مريحة للعين، متجاوبة مع الشاشات، مع ألوان هادئة (أخضر وبرتقالي).

##  التقنيات المستخدمة (Tech Stack)

- **Backend:** PHP (Vanilla)
- **Database:** MySQL (قاعدة بيانات `student_db`)
- **Frontend:** HTML5, CSS3 (Flexbox)
- **Server:** XAMPP (Apache & MySQL)

## طريقة التشغيل (How to Run Locally)

1. قم بتثبيت [XAMPP](https://www.apachefriends.org/).
2. افتح XAMPP Control Panel وشغّل **Apache** و **MySQL**.
3. ضع مجلد المشروع داخل: `C:\xampp\htdocs\classroom-hub`.
4. افتح [phpMyAdmin](http://localhost/phpmyadmin) وأنشئ قاعدة بيانات باسم `student_db`.
5. قم باستيراد (Import) ملف قاعدة البيانات `student_db.sql` (المرفق في المشروع).
6. افتح المتصفح على الرابط: `http://localhost/classroom-hub/`

## هيكلية المشروع (Project Structure)

```text
classroom-hub/
├── index.php           # تحويل تلقائي لصفحة الإضافة
├── form.php            # صفحة إضافة طالب جديد
├── StudentProfile.php  # صفحة عرض، بحث، وحذف الطلاب
├── edit.php            # صفحة تعديل بيانات الطالب
├── style.css           # ملف التنسيقات المشترك
└── student_db.sql      # (مطلوب تصديره) قاعدة البيانات
