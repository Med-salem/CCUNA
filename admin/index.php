<?php
    session_start();
    $noNavbar='';
    $noSection='';
    $pageTitle = 'Login';
    if(isset($_SESSION['userName'])){
      header('Location: dashbord.php'); //Redirect to dashbord page
    }
    include "init.php";
    
    

   // check if user coming from http post request 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $username = $_POST['user'];
        $password = $_POST['password'];
        $hashedpass = sha1($password);
        echo $hashedpass;

        //check if the user exist in database

        $stmt = $con->prepare("SELECT userID,userName,password FROM Users WHERE userName= ? AND password= ? AND groupID= 1 LIMIT 1");
        $stmt->execute(array($username,$hashedpass));
        $row=$stmt->fetch();
        $count=$stmt->rowCount();

        if($count > 0) {
            $_SESSION['userName'] = $username;  // Register Session Name
            $_SESSION['ID']=$row['userID'];     // Register Session ID
            header('Location: dashbord.php');   //Redirect to dashbord page

           //exit();
        }
   }
    
?>
    
    <form class='login' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <h4 class="text-center">Admin Login</h4>
        <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off" />
        <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />
        <input class="btn btn-primary btn-block" type="submit" value="Login" /> 
    </form>    
<?php
    include  $tpl.'/footer.php';
?>
