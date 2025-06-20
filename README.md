# Blog
Personal blog ("Gruppe" 7)

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
## Add new pages
Copy template.php to use as a template for all pages and projects-template.php for every project blogpost. EVERY name of a .php file has to be UNIQUE to ALL other .php blog files and only be made of alphanumerics and underscores to make database tables for their comments unique!

## Debug database
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

## Requirements
- [x] Add Content:
  - [x] Add categories to header (remove Contact)
  - [x] Function that provides way to easily add a text, image and image caption in a standardized way to a blog post
  - [x] Add Blog posts:
    - [x] Projects:
      - [x] iframes for finished devprojects, with source code shown below (with tabs for multiple files?)
    - [2] Travel:
      - [2] Copy instagram posts (and translate) in parts into lang files and with images inserted in between
    - [1] Food:
      - [x] Matcha Anleitung
  - [x] About page: Short description of me, Japan side profile and text what i do
  - [x] Home page: Something interesting? (link to profile)
  - [x] Add category-pages that list blog posts in their category (and preview?)
- [x] Database that stores comments
  - [x] Create and connect to database
  - [x] Create a table for comments every time you enter a blog page that needs it and doesn't have its own table yet
  - [x] Form section in php-File (blog footer that includes) that can be included under Blog Posts for users to 
    - [x] Post comments
    - [x] Username prompt only once and save username, then use stored username for POST
    - [x] Show posted comments with buttons for every comment:
      - [x] Delete comments (report voting, 3 reports -> deletes comment)
      - [x] Like/Dislike buttons
      - [x] Make sure every user uses each button only once!
      - [x] Format Date better
    - [x] Sort comments by likes
    - [x] Add texts to language files
    - [x] Redirect to page at the correct scroll point
  - [x] Style comments section to look good
- [x] Footer: Display Icons with links to socials / github
- [] DOKUMENTATION
- [] 22.06. Abgabe allerspätestens
- [] Init File for loading a few SQL rows into the tables each to give a usable initial state / save current state
- [x] Code Viewer Höhe begrenzen und scrollable machen
- [x] Saving IDs: Topmost element, not focused middle one
## Optional Requirements:
- [] Finish Design/Layout of website:
  - [] Header untereinander und einklappen mit Hamburger Menu wenn screen nicht breit genug
- [] Database that counts amount of visitors
- [x] Make sure no XSS/SQL-Attacks are possible in Forms
- [] Search bar
- [] Icon for Title
- [] Allow Cookies prompt
- [] Enable / Disable saving IDs/Classes
- [] Fix zoom for index (replace with something else)