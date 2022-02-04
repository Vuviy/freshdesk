# freshdesk

This script gating all tickets and associated info from Help desk system "Freshdesk" and write them in csv-file;

Used technologies: PHP, Docker, Composer, Nginx, Guzzle;

How use: 
1. In index.php you must send data in the object of class Tickets(now it's a @ticketsObj) as: 'your_domain', 'api_kay', 'your_password';
2. In command line write(you must be in this project directory):
      docker-compose build and 
      docker-compose run
3. Open page in browser with address localhost:80;
4. Every reloading this page will creating csv-file with name ""tickets" date()";
