# EHR_System
Electronic Health Record System

# Setup
Application currently runs on localhost using XAMPP application, which has Apache and MySQL

## Installing XAMPP and Setup
- XAMPP Installer: https://www.apachefriends.org/download.html

- Make sure that under server Apache, MySQL and Tomcat are ticked.
- Make sure that under Program Languages PHP and phpMyAdmin is ticked.
- <b><i>Suggestion: Leave everything as a default (i.e. everything ticked).</b></i>

- Remember the directory where you installed XAMPP.
- <b><i>Suggestion: Do not install it in Program Files. I recommend intalling it directly to your local disk (typically 'C:' directory in Windows).</b></i>

- Upon successful installation open XAMPP Control Panel.
- Click start button next to Apache and MySQL, both should get highlighted in green.

## Adding souce files

- You know how I said remember where you installed XAMPP? Well... go to that directory.
- There should be folder named 'xampp' so go to 'xampp/htdocs/' and clone this repo in there.
- Make sure that inside the 'securemessaging' folder there is a file called 'index.php' since this is the main file that XAMPP is going to look for when trying to run your application.

## Setting up database

- First time you install XAMPP you will have to create the main database.

- Go to your browser and type in <b>localhost/phpmyadmin/</b>
- Assuming that xampp is running properly you should be able to see a phpMyAdmin page. On the left hand side is the list of all database you are hosting on XAMPP.
- Click on <b>New</b> at the top of that list:
- <b>Important</b> : please make sure you name your database <b>ehr_db</b> and in drop down menu select 'Collation'. Click create.

- In 'xmpp/mysql/data/ dir you should be able to see a folder named ehr_db.

- Leave this database empty as once you run your application for the first time, the '<b>db-init.php</b>' will create a table with 30 random users.

- If you rfresh phpMyAdmin page after this you will be able to see users table in ehr_db

# Note to Developers
1. 'securemessaging/view/' directory contains all html files
2. 'securemessaging/stylesheets/'directory contains all css files.
3. 'securemessaging/' directory has all php files that deal with files that are visible to the user (i.e. all html and css files).
4. 'securemessaging/includes/' has all php files that do not deal with html or css files. These files are used for creating a tables, making a connection to a database, authenticating the user access, etc...
5. 'securemessaging/icons/' has font-awesome-4.7.0 libary for icons.
6. 'securemessaging/images/' contains all image files.
7. 'securemessaging/documentation/' contains any documents neccessary for the application
5. 'index.php' is an imprortant file since this is what XAMPP is looking for when you are hosting your aplication on it. SO PLEASE DO NOT CHANGE THE NAME OF THIS FILE. This is the first file that gets called when application is run. You can simply include more html or php files if you wish to add functionality.

# Database Connection
Currently, database is hosted locally with MySQL hence the file dbh.php (located in 'ehr_system/includes/') only connects to localhost with root credentials. If you wish to host a database on a web server or cloud these credentials can be modified to suit your application. More details on each parameter are described in the code.

# Managing Database Manually
In your browser go to 'localhost/phpmyadmin/' and you should be able to see all databases listed on the left-hand side. You can simply select 'ehr_db' and available tables will show up. From here you can manage tables, see their structures and write SQL queries.







