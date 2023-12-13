## About Laravel and NodeMCU ESP8266

This project for your testing connection between NodeMCU ESP8266 to Laravel as server. Focus point in this project is how to make connection between NodeMCU ESP8266 to Laravel as server therefore in this project just make a switch for turnon / turnoff led. this project made using JQuery for AJAX to server, MySQL for database and Bootstrap for UI. lets install this project before you run.

--Salam--

## How to Install

1. Clone this repository to your directory (must in xampp/htdocs/)
2. rename this project according to your wishes
3. cd `this project`
4. Run `composer update`
5. copy .env.example to .env run `cp .env.example .env`
6. Generate the application key using `php artisan key:generate`
7. Set your .env file
8. Run database migrations and seed the database using `php artisan migrate --seed`

## Running

1. Split your Terminal
2. In one side run `php artisan serve` and another `npm run dev`
3. Usually you will got URL `127.0.0.1:8000` and open that URL in your browser

## http.GET() from NodeMCU ESP8266

declare variabel host as `const char* host` for your IP <br>

String BASE_URL = "http://" + String(host) + "/webiot/public/api"; <br>
WiFiClient client; <br>
HTTPClient http; <br>

String url = BASE_URL + "/led"; <br>
http.begin(client, url); <br>
String response = http.getString();<br>

now just execute response for HIGH, and LOW led
