
<?php

require("head.php"); 
require("banner.php"); 
//register.php

/**
 * Start the session.
 */
session_start();

 
/**
 * Include our MySQL connection.
 */
require 'conex.php';

 
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $pregunta = !empty($_POST['pregunta']) ? trim($_POST['pregunta']) : null;
    
     //Check the name and make sure that it isn't a blank/empty string.
    if(strlen(trim($pregunta)) === 0){
        //Blank string, add error to $errors array.
          echo "<script type=\"text/javascript\">alert(\"Debe escribir una pregunta!\");</script>";  
    }
    
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
     
    //Prepare our INSERT statement.
    //
    
    

    else{
    $sql = "INSERT INTO pregunta (contenido) VALUES (:pregunta)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':pregunta', $pregunta);
  

    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo "<script type=\"text/javascript\">alert(\"Su pregunta ha sido enviada y sera publicada luego de ser aprobada por el administrador!\");</script>";  
    }
    
}
}
?>
	 
	<body>
		<div style="text-align: center;">
			
	<br>
		 <h1>Escriba su pregunta</h1>

		
		<br>
 <form action="pregunta.php" method="post">
          
  <textarea maxlength="140" rows="4" cols="50" id="pregunta" name="pregunta"></textarea>
           <br>
            <input type="submit" name="register" value="Aceptar"></button>
 </form>

 

	<a href="index.php"><img src="img/atras.png" alt="atras" title="atras"></a>	

	<br><br>
</div>
 

 	<?php 
require("footer.php");
 ?>

<script src='js/jquery.min.js'></script>
<script  src="js/index.js"></script>
	</body>

	</html>
