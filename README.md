# EHR_System
Electronic Health Record System

This project contains two main folders:
1. <b>ehr_db</b> - containing the main database files.
2. <b>ehr_system</b> - containing all necessary files for the application.

# Setup
Application currently runs on localhost using XAMPP application, which has Apache and MySQL

## Installing XAMPP and Setup
- XAMPP Installer: https://www.apachefriends.org/download.html

- Make sure that under server Apache, MySQL and Tomcat are ticked.
- Make sure that under Program Languages PHP and phpMyAdmin is ticked.
- <b><i> Suggestion: Leave everything as a default (i.e. everything ticked). </i></b>

- Remember the directory where you installed XAMPP.
- <b><i> Suggestion: Do not install it in Program Files. I recommend intalling it directly to your local disk (typically 'C:' directory in Windows).</i></b>

- Upon successful installation open XAMPP Control Panel.
- Click start button next to Apache and MySQL, both should get highlighted in green.

- In the folder where XAMPP was installed go to 'msql/data/' and copy the 'ehr_db' folder. This will setup your database.
- Go back xampp folder and then go to 'htdocs/' folder and copy in the 'ehr_system' folder. This will add all HTML, CSS and PHP files for your application.
- Make sure that inside the 'ehr_system' folder there is a file called 'index.php' since this is the main file that XAMPP is going to look for when trying to run your application.

# Note to Developers
1. 'ehr_system/view/' directory contains all html files
2. 'ehr_system/stylesheets/'directory contains all css files.
3. 'ehr_system/' directory has all php files that deal with files that are visible to the user (i.e. all html and css files).
4. 'ehr_system/includes/' has all php files that do not deal with html or css files. These files are used for creating a tables, making a connection to a database, authenticating the user access, etc...
5. 'index.php' is an imprortant file since this is what XAMPP is looking for when you are hosting your aplication on it. SO PLEASE DO NOT CHANGE THE NAME OF THIS FILE. This is the first file that gets called when application is run. You can simply include more html or php files if you wish to add functionality.

# Database Connection
Currently, database is hosted locally with MySQL hence the file dbh.php (located in 'ehr_system/includes/') only connects to localhost with root credentials. If you wish to host a database on a web server or cloud these credentials can be modified to suit your application. More details on each parameter are described in the code.

# Managing Database Manually
In your browser go to 'localhost/phpmyadmin/' and you should be able to see all databases listed on the left-hand side. You can simply select 'ehr_db' and available tables will show up. From here you can manage tables, see their structures and write SQL queries.

# Application so far
- The basic skeleton of the home page and signup form has been designed.
- Connection to the database has been established but signup form currently has an error so there is no data inside the users table in the database, apart from the admin user.






