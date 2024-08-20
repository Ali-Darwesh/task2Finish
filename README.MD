# ali-darwesh-task2
task2
 نظام بسيط لإدارة المدونات يتيح للمستخدمين إنشاء وقراءة وتحديث وحذف المقالات.
 
  posts لانشاء قاعدة البيانات والاتصال بها اول مرة وانشاء جدول  db.sql  ملف 

 للنحقق من انشاء القاعدة والاتصال وانشاء  database classمن object يتم فيه انشاء confige.php   ملف 
 validation class. من object و post class من  object
index.php:
 listAll بياخدنا عصفحة 
 - `create_post.php`: نموذج لإنشاء مقالة جديدة.
     - `view_post.php`: عرض مقالة واحدة.
     - `edit_post.php`: نموذج لتعديل مقالة موجودة.
     - `delete_post.php`: سكريبت لحذف مقالة.
     - `list_posts.php`: عرض جميع المقالات مع روابط لعرض، تعديل، وحذف كل مقالة.
لتشغيل الكود
1-localhost-وضع الملف في 
2-فتح database server
3-الحالة الافتراضية لاعدادات الاتصال هي ("",localhost,root) يمكن تغيرها في ملف confige.php
4-فتح ملف index على المتصفح