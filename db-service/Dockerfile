FROM mysql:5.7.22

# Create the user account that will be allowed to access the database
RUN mysql -u root -p
RUN GRANT ALL ON $MYSQL_DATABASE.* TO '$DB_USERNAME'@'%' IDENTIFIED BY '$DB_PASSWORD';
RUN FLUSH PRIVILEGES;
RUN exit;
