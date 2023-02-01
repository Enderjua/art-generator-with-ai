# Art generator with AI

Introducing the website where you can have images drawn by OpenAI's DALL-E AI using the API Key provided by the OpenAI organization! All you need to do is set up the database connection and add the API Key. Let's learn!

Example image:


<img src="/example/example01.jpg" width="256" height="256" alt="sample image 1" title="sample image 1">
<img src="/example/example02.jpg" width="256" height="256" alt="sample image 2" title="sample image 2">
<img src="/example/example03.jpg" width="256" height="256" alt="sample image 3" title="sample image 3">
<img src="/example/example04.jpg" width="256" height="256" alt="sample image 4" title="sample image 4">
<img src="/example/example05.jpg" width="256" height="256" alt="sample image 5" title="sample image 5">

These images were produced by the previously mentioned DALL-E. However, our goal is to make it possible to use this DALL-E AI on our own website. Here are the original Github pages:

 * [OpenAI](https://github.com/openai/)
 * [Mustache OpenAI](https://github.com/openai/openai-openapi)

# Requirements

You need to have Python installed on your computer and also have Flask installed. In addition, you need an Apache server, I chose Xampp for this project
Install [Python](https://www.python.org/)
Install Flask 
```
pip install flask
```
Install [XAMPP](https://www.apachefriends.org/tr/index.html)

# Setup

**[1]** Install other required Python packages:
```
pip install openai
pip install requests
```

**[2]** Clone this repository and switch to its directory:
```
git clone https://github.com/Enderjua/art-generator-with-ai.git
cd art-generator-with-ai
```

**[3]** Put API Key:
```
cd imageFlask
```
Open app.py and change API Key:
```
openai.api_key = "PUT YOUR KEY"
```

**[4]** Open XAMPP (for linux):
```
cd
cd ..
cd ..
cd /opt
cd /lampp
sudo ./xampp start
```

**[5]** Create Database for login and images:
To import the loginTry.sql file into your phpMyAdmin, follow these steps:

 * Open your phpMyAdmin dashboard.
 * Select the database where you want to import the file.
 * Click on the "Import" tab in the navigation menu.
 * Click on the "Choose File" button and select the loginTry.sql file from your local machine.
 * Select the "SQL" option as the format of the imported file.
 * Click on the "Go" button to start the import process.
 * The database tables, data and structure defined in the loginTry.sql file will be imported into your selected database.

Note: Make sure your loginTry.sql file is properly formatted and does not contain any errors before importing.

**[6]** Upload files:
```
cd
cd ..
cd ..
cd /opt
cd /lampp
cd htdocs/
```
You are uploading files located in the "files" folder in this directory.


**[7]** Edit includes:
You enter the "includes" folder and go to the connection.php located there and fill in your database information.
Also, you enter your IP address as a whitelist in checkIp.php.
Note: if you like, you can disable checkIp!

connection.php
```
<?php
$servername = "alsoLocalhost";
$username = "alsoRoot";
$password = "alsoSpace";
$dbname = "loginTry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database error: " . $conn->connect_error);
} 

?>
```

checkIp.php
```
<?php
    // Get IP Adress
    $user_ip = $_SERVER['REMOTE_ADDR'];
    // Hash with SHA256 Ip Adress
    $user = hash('sha256', $user_ip);
    // Whitelist Ip Adrss with SHA256 Format
    $whitelist = array('12ca17b49af2289436f303e0166030a21e525d266e209267433801a8fd4071a0', 'a57d2256b1335800cea68b9952f10c13799f727411894ca46ca2ee97de4594b9', 'eff8e7ca506627fe15dda5e0e512fcaad70b6d520f37cc76597fdb4f2d83a1a3');
    // Controls
    if (!in_array($user, $whitelist)) {
        // fuck die
        die('kvalitetna odjeća i trgovine');
    } else {
       
    }
?>
```

# Usage

To complete the installation process, you need to have successfully completed the previous steps. After doing so, when you arrive at the index.php screen, you will be greeted by a Login page. 

Here, you will enter "admin@gmail.com" for the email address and "admin" for the password and click the "Login" button. 
Then, a simple form screen will appear in front of you. 
All you need to do is fill in the required information and press the "Submit" button. 

Then, the image will appear in front of you. The secret behind this system is that you create a REST API using Flask, and when you send the desired information to this REST API, it produces an image for you. On the PHP page, the values entered into the input are sent to the REST API, and the image received from the REST API is not saved anywhere but transferred to the SQL database.

This way, security is taken into account. Measures have been taken to prevent SQL Injection.

# Technologies used in the project

These tools have been helpful to us:

 * PYTHON3
 * FLASK
 * PHP
 * PDO
 * APACHE
 * MYSQL
 * REQUESTS
 * OPENAI
 * DALL-E
 * CURL
 * PREPARE

Some examples: 
```
$pdo = new PDO("mysql:host=localhost;dbname=loginTry", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```
We established a connection to the database by using PDO here.

```
$prompt = $_POST['prompt'];
$prompt = str_replace(" ", "+", $prompt);
$n = $_POST['n'];
$size = $_POST['size'];
$url = 'localhost:5000/image/'.$prompt.'/'.$n.'/'.$size;
// $url = 'http://localhost:5000/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
```
We used cURL to make a request to the REST API.

# Support our project

As an AI language model, I don't have personal preferences, but I'd like to say that it's great to see people contributing to projects and working towards their goals. Good luck with your project!

My email adress: enderjua@gmail.com
