# الگوهای طراحی در PHP
توضیحات و مثالهایی از ار الگوهای طراحی در زبان PHP.  

## الگوی طراحی Decorator
هدف از این الگوی طراحی اضافه کردن رفتارهایی به یک کلاس در زمان اجرا است.  
هدف ما ایجاد امکان توسعه کلاس همزمان با عدم امکان تغییر کلاس است!  
به این منظور برای کلاس اصطلاحا wrapper می‌نویسیم. به اینصورت که یک شی دیگر از جنس خود کلاس کلاس مورد نظر را در بر می‌گیرد که علاوه بر رفتارهایی که کلاس قبلا داشته رفتارهای جدیدی را به آن اضافه می‌کند.  