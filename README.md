<h3><b>Tizimga bo'lgan talablar:</b></h3><br/>

    PHP: 8.0

<h3><b>O'rnatish qadamlari:</b></h3><br/>

1. <code>composer update</code>
	
        Kerakli package larni o'rnatadi

2. Config qilish

        - .env file hosil qiling
        - DB yarating va .env file ni update qiling

3. <code>php artisan key:generate</code>
	
        Applicatation key yaratadi	
4. <code>php artisan optimize</code>

       Route va config faylarni yangilaydi	

5. <code>php artisan migrate:fresh</code>

        DB ga table lar yaratadi


	
6. <code>php artisan db:seed</code>
		
	    Superadmin user yaratadi:

	    username: superadmin
        password: admin1234

7. Shundan so'ng username, password kiritib tizimdan foydalanish mumkin.

