<?php 

    // First we execute our common code to connection to the database and start the session 
    require("login/common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login/login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
    
    $by = $_SESSION['user']['username'];
    $title = $_POST['title'];
    $all_info = $_POST['all_info'];
    
                $dbhost="localhost";
                $dbuser="a1070rik";
                $dbpass="";
                $dbname="blog";
    
    if(isset($_POST['submit'])){
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        
        $sql = "INSERT INTO `posts`(`title`, `by`, `text`) VALUES ('".$title."', '".$all_info."', '".$by."')";
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }$conn->close();
    }
    
    
?> 