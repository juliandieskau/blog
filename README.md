# Blog
Personal blog ("Gruppe" 7)

## Add new pages
Copy ./template.php to use as a template for all pages. EVERY name of a .php file has to be UNIQUE to ALL other .php blog files and only be made of alphanumerics and underscores!

## Set up website
### Start webserver
In project root, to start apache webserver and mysql database in blog_default docker-network:
```cmd
docker compose up -d
```
Or, if docker config/image is changed or starting for the first time:
```cmd
docker compose up --build
```
Check if everything is running:
```cmd
docker ps
```
### Open website
In Browser, open `localhost:80` to open the homepage.
### Stop webserver
```cmd
docker compose down
```

## Debug website
### Use mysql console
Open bash as an interactive terminal inside the running mysql container
```cmd
docker exec -it blog_mysql bash
```
Login to database inside mysql container, when asked type in the password found in docker_compose.yaml in the MYSQL_PASSWORD env variable.
```bash
mysql -u julian -p blogdb
julianpassword
```
Example for mysql commands: List databases
```mysql
SHOW databases;
```
List tables in database
```mysql
SHOW TABLES;
```
Select the blog database
```mysql
USE blogdb;
```
Show the contents of a table
```mysql
SELECT * FROM table_name;
```
Delete a table
```mysql
DROP TABLE table_name;
```
### Exit mysql console
```mysql
exit
```
exit container interactive terminal
```bash
exit
```

## TODO
- [] Add Content:
  - [x] Add categories to header (remove Contact)
  - [] Add Blog posts:
    - [] Projects:
      - [1] iframes for finished devprojects, with source code shown below (with tabs for multiple files?)
    - [] Travel:
      - [] Copy instagram posts (and translate) in parts into lang files and with images inserted in between
    - [] Food:
      - [] Matcha Anleitung
      - [] Rezepte mit Bildern, die ich recently gemacht habe
    - [] About page: Japan side profile and text what i do
    - [] Home page: Short description of me (link to profile)
  - [] Add category-pages that list blog posts in their category (and preview?)
- [] Database that stores comments
  - [x] Create and connect to database
  - [x] Create a table for comments every time you enter a blog page that needs it and doesn't have its own table yet
  - [] Form section in php-File (blog footer that includes) that can be included under Blog Posts for users to 
    - [x] Post comments
    - [x] Username prompt only once and save username, then use stored username for POST
    - [] Show posted comments with buttons for every comment:
      - [] Delete comments (report voting, 3 reports -> deletes comment)
      - [] Like/Dislike buttons
    - [] Sort comments by likes
    - [] Add texts to language files
    - [x] Redirect to page at the correct scroll point
  - [] Style comments section to look good
- [] Footer: Display Icons with links to socials / github
- [] DOKUMENTATION
- [] 22.06. Abgabe allerspätestens
Maybe:
- [] Finish Design/Layout of website:
  - [] Header untereinander und einklappen mit Hamburger Menu wenn screen nicht breit genug
- [] Display localhost/ as localhost/index.php
- [] Sub menu below header, that opens on hovering over categories with sub pages
- [] Database that counts amount of visitors
- [] Make sure no XSS/SQL-Attacks are possible in Forms
- [] Search bar
- [] Icon for Title