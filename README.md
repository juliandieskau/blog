# Blog
Personal blog ("Gruppe" 7)

## Add new pages
Copy ./template.php to use as a template for all pages.

## Set up website
### Start webserver
In project root, to start apache webserver and mysql database in blog_default docker-network:
```cmd
docker compose up -d
```
Or, if docker config/image is changed:
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
Example for mysql commands: Show databases
```mysql
show databases;
```
### Exit mysql console
```mysql
exit
```
exit container interactive terminal
```bash
exit
```