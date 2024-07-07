Create Project 
composer create-project codeigniter4/appstarter EA3141



Run web server > "php spark serve"


Access Urls: http://localhost:8080/view_user
             http://localhost:8080/add_user
             http://localhost:8080/

Project Structure

22SEA069/
├── app/
│   ├── Config/
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── Login.php
│   │   └── User.php
|   |── Mpdels/
|   |   ├── UserModel.php
│   ├── Views/
│   │   ├── layouts/
│   │   │   └── starter.php
│   │   ├── pages/
│   │   │   └── login.php
│   │   │       
│   │   └── user/
│   │       ├── add_user.php
│   │       └── view_user.php
├── public/
│   ├── dist/
│   │   ├── css/
│   │   │   └── adminlte.min.css
│   │   └── img/
│   │       ├── AdminLTELogo.png
│   │       └── user1-128x128.jpg
│   ├── plugins/
│   │   ├── fontawesome-free/
│   │   │   └── css/
│   │   │       └── all.min.css
│   │   ├── jquery/
│   │   │   └── jquery.min.js
│   │   └── bootstrap/
│   │       ├── css/    
│   │       │   └── bootstrap.min.css
│   │       └── js/
│   │           └── bootstrap.bundle.min.js
│   ├── index.php
│   ├── .htaccess