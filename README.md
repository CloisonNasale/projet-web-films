# projet-web-films

docker run --name mysqlDev -e MYSQL_ROOT_PASSWORD=motdepasse -d -p 3306:3306 mysql:8

docker run --name phpmyadmin -d --link mysqlDev:db -p 8080:80 phpmyadmin/phpmyadmin
