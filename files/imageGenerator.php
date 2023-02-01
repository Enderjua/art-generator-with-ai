<?php 

// Database Connection
include_once("connection.php");

// Check IP Adress
include_once("checkIp.php");

// Check Login or Not Login
include_once("checkLogin.php");

?>
       
      <div id="content" class="p-4 p-md-5 pt-5">
       <form method="POST">
   Prompt <input type="text" name="prompt"><br>
   İmage num(please only say 1)<input type="text" name="n"><br>
   (256x256,512x512,1024x1024) <input type="text" name="size"><br>
   <input name="submit" type="submit" value="Go">
   </form>

   <?php 

if (isset($_POST['submit'])) {
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
   echo "<br>";
   $path = "generatePhoto/".$output;
   try {
     $pdo = new PDO("mysql:host=localhost;dbname=loginTry", "root", "");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     $img_path = $path;
     if (file_exists($path)){
        $img_data = file_get_contents($img_path);
     $img_name = $output;
     $img_type = 'image/png';
                 $stmt = $pdo->prepare("INSERT INTO images (type, name, data) VALUES (:type, :name, :data)");
                 $stmt->bindParam(':type', $img_type);
                 $stmt->bindParam(':name', $img_name);
                 $stmt->bindParam(':data', $img_data, PDO::PARAM_LOB);
                 $stmt->execute();
                 if (file_exists($path)) {
                    unlink($path);
                } else {
                   echo "Sistem kaynaklı bir problem yaşanıyor!";
                }
             } else {
              echo "Sistem kaynaklı bir problem yaşanıyor";
           }
     } 
     
  catch (PDOException $e) {
     echo "Error: " . $e->getMessage();
 }

 try {
  $pdo = new PDO("mysql:host=localhost;dbname=loginTry", "root", "");
  
 $stmt = $pdo->prepare('SELECT data FROM images WHERE name = :name');
 $stmt->execute(['name' => $output]);
 $imageData = $stmt->fetchColumn();
 $encodeImageData = base64_encode($imageData);
 $trueData = true;

 // Fotoğrafı <img> tagının src bölümüne atayın
 echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '" alt="Fotoğraf">';
 }
catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
} else {
   echo "Henüz Fotoğraf Oluşturmadınız!";
}
   
   ?>



    
      </div>
		</div>

    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/popper.js"></script>
    <script src="include/js/bootstrap.min.js"></script>
    <script src="include/js/main.js"></script>
  </body>
</html>
