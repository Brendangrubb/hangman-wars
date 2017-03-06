# **Hangman Wars**
#### Erica Wright, Zach Swanson, Charles Peden & Brendan Grubb, 3/6/2017

&nbsp;
## Description


&nbsp;
## Specifications

### Functionality 1
|Behavior|Input|Output|
|--------|-----|------|
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |

### Functionality 2
|Behavior|Input|Output|
|--------|-----|------|
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |

### ETC


&nbsp;
## Setup/Installation Requirements
##### _To view and use this application:_
* It is necessary to download and install a few programs to use this application
    * Go to [getcomposer.org] (https://getcomposer.org/) to download Composer (a dependency manager) for free.
    * If you plan on using this app on a mac, go to [mamp.info] (https://www.mamp.info/en/downloads/) to download MAMP for free. If you're not using a mac, make sure you have software installed that allows you to host a web server via Apache and manage a database via MySQL (WAMP, LAMP, etc)
* Go to my [Github repository] (https://github.com/Brendangrubb/hangman-wars)
* Download the zip file via the green button
* Unzip the file and open the **_hangman-wars-master_** folder
* Inside of the **_hangman-wars-master_** folder, unzip the **_localhost.sql.zip_** file
* Open MAMP (or equivalent) and click on preferences/ports.
    * Make sure that the Apache port number is set to 8888 and the MySQL port number is set to 8889
    * Click start servers.
* Type **_localhost:8888/phpmyadmin_** into your web browser
    * Click the _Import_ tab on the nav bar
    * Click _Choose File_ and navigate to the unzipped **_localhost.sql_**
    * click _GO_
* Open Terminal, navigate to **_hangman-wars-master_** project folder, type **_composer install_** and hit enter
* Navigate Terminal to the **_hangman-wars-master_/web_** folder and set up a server by typing **_php -S localhost:8000_**
* Type **_localhost:8000_** into your web browser
* The application will load and be ready to use!

&nbsp;
## Known Bugs
* No known bugs

&nbsp;
## Technologies Used
* PHP
* Silex
* Twig
* PHPUnit
* SQL
* Apache
* Composer
* Bootstrap
* CSS
* HTML

&nbsp;
_If you have any questions or comments about this program, you can contact me at [brendangrubb@gmail.com](mailto:brendangrubb@gmail.com)._

Copyright (c) 2017 Erica Wright, Zach Swanson, Charles Peden & Brendan Grubb

This software is licensed under the GPL license
