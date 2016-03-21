# README #

This App used to store contacts.Contact may be personal or buisness .

### What is this repository for? ###

* store and retrieve contacts.

### How do I get set up? ###

* Pull this repo to web server folder.this will download a folder address-book with source code in src folder.
* Install composer in the system (ref https://getcomposer.org/download/ )
* open a command prompt and navigate to src folder .
* execute the command "composer global require "fxp/composer-asset-plugin:~1.0.3""
* execute command "composer install". this will download all dependencies.
* folder "db" inside main address-book folder contains sql for the database
* Import this sql to a database named "address-book"
* The sql connection credentials for the app is username=root,password="".
* if this is not your credentials you can change it in "src\config\db.php"
* to test the application ,in browser go to "http://localhost/address-book/src/web/"

