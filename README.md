# streamlabs
twitch tv web application

#Server requirement 
PHP >= 7.0.0<br>
OpenSSL PHP Extension<br>
PDO PHP Extension<br>
Mbstring PHP Extension<br>
Tokenizer PHP Extension<br>
XML PHP Extension<br>
MYSQL server 5.5 or above <br>
Twitch developer account

#Installation guide 
Clone the repo from git@github.com:mohamedrasvi/streamlabs.git <br>
Run (Composer install) <br>
Run this command to copy the .env file (cp -i .env.example .env) <br>
Change your database credentials  and Twitch credentials on .env file <br>
Run (php artisan migrate)<br>
You can setup a virtual server or docker or run (php artisan serve
) to see the website on browser





