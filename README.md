# streamlabs
twitch tv web application

# Server requirement 
PHP >= 7.0.0<br>
OpenSSL PHP Extension<br>
PDO PHP Extension<br>
Mbstring PHP Extension<br>
Tokenizer PHP Extension<br>
XML PHP Extension<br>
MYSQL server 5.5 or above <br>
Twitch developer account

# Installation guide 
Clone the repo from git@github.com:mohamedrasvi/streamlabs.git <br>
Run (Composer install) <br>
Run this command to copy the .env file (cp -i .env.example .env) <br>
Change your database credentials  and Twitch credentials on .env file <br>
Run (php artisan migrate)<br>
You can setup a virtual server or docker or run (php artisan serve
) to see the website on browser

# live demo
Url : http://streamlabs-streamlabs.1d35.starter-us-east-1.openshiftapps.com<br>L
How it work (when you click the url it takes you to sign-in page twitch once successfully signed-in it returns back to our live demo)<br>
You can add or update streamer<br>
Home page will show your streamer live streaming, chat with latest top ten videos<br>
Please note it is hosted on free Openshift server sometime it goes up and down so always refresh if you get any error message,
Have used very simple front-end <br>

# Architecture diagram deployment and server 
![Screenshot](doc/img2.png)<br>
Please I have uploaded sample image to show how I will deploy to AWS<br>
I will containerize  the repository and deploy to many nodes 
I will have a Loadbalance to handle traffic and all (amazon loadbalance does many things)














