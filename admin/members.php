<?php

    

    /*
    ================================================
    == Manage Members Page
    == You Can ADD | EDIT | DELETE Members From Here
    ================================================
    */

    ob_start();  //Output Buffering Start

    session_start();

    $pageTitle = 'Members';

    $noSection='';

    if(isset($_SESSION['userName'])){
        include 'init.php' ; 
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    //start Manage Page
    
    if($do == 'Manage'){//Manage Members Page 
         
        $query = '';

        if(isset($_GET['page']) && $_GET['page'] == 'Pending'){
            $query = 'AND regStatus = 0';
        }
        //Select all Users without admin

        $stmt=$con->prepare("SELECT * FROM users WHERE groupID != 1 $query");
        $stmt->execute();

        $rows = $stmt->fetchAll();
        if(! empty($rows)){
    ?><h1 class="text-center">Manage Members</h1>
        <div class="container">
            <div class="table-responsive">
            <table class="text-center table table-bordered main-table">
                <tr>
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Registerd Date</td>
                    <td>Control</td>
                </tr>
<?php foreach($rows as $row) {
                    echo '<tr>';
                        echo '<td>'. $row['userID'] . '</td>';  
                        echo '<td>'. $row['Name'] . '</td>';
                        echo '<td>'. $row['userName'] . '</td>';
                        echo '<td>'. $row['Email'] . '</td>';
                        echo '<td>'. $row['Date'] . '</td>'; 
                        echo 
                        "<td>
                        <a href='members.php?do=Edit&userID=". $row['userID'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                        <a href='members.php?do=Delete&userID=". $row['userID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

                        if($row['regStatus'] == 0){
                            echo "<a href='members.php?do=Activate&userID=". $row['userID'] ."' class='btn btn-info activate'><i class='fa fa-check '></i> Activate</a>";
                        }
                        
                        echo "</td>"; 
                    echo '</tr>';
                }?>
            </table>
            </div>
        <a href="members.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Member</a> 
    </div>
    
    <?php 
        } else {
            echo '<div class="container">';
                echo '<div class="nice-message">There\'s No Members To Show</div>';
                echo '        <a href="members.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Member</a>';    
            echo '</div>';
        }  
    
    }elseif($do == 'Add'){//Add Members Page ?>

        <h1 class="text-center">Add New Member</h1>
        <div class="container">
            <form class="form-horizontal" action="?do=Insert" method="POST">
                <!-- Start userName Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Username:</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="username"  class="form-control" autocomplete="off" requierd="requierd" placeholder="UserName"/>
                    </div>
                </div>
                <!-- End userName Field -->
                <!-- Start Name Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="Name" class="form-control" requierd="requierd" placeholder="Name"/>
                    </div>
                </div>
                <!-- End Name Field -->
                <!-- Start Password Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="password" name="password" class="form-control" autocomplete="new-password" requierd="requierd" placeholder="Password" />
                    </div>
                </div>
                <!-- End Password Field -->
                <!-- Start Email Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="email" name="email" class="form-control" requierd="requierd" placeholder="Email"/>
                    </div>
                </div>
                <!-- End Email Field -->
                <!-- Start Submit Field -->
                <div class="form-group">
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Add Member" class="btn btn-primary btn-lg " />
                    </div>
                </div>
                <!-- End Submit Field -->
            </form>
        </div>
<?php  
        }elseif($do == 'Insert'){//Insert Member Page
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'>Insert Member</h1>";
                
                //Get Variables From The Form\
                
                $userName=$_POST['username'];
                $pass=$_POST['password'];
                $name=$_POST['Name'];
                $email=$_POST['email'];

                $hashpass =sha1($_POST['password']);

                //Validate Form

                $formErrors = array(); 
                
                if(empty($userName)){

                }

                if(empty($name)){
                    
                }

                if(empty($email)){
                    
                }
                
                //Check If Users Exist in Database

                $check = checkItem("userName","users",$userName);

                if($check == 1){

                    $Msg = '<div class="alert alert-danger">Sorry This User Is Exist</div>';
                    redirectHome($Msg,'back');
                }else{

                // Insert Users Info In Database

                $stmt = $con->prepare("INSERT INTO users(userName,password,Email,Name,regStatus,Date) Values(:username,:pass,:email,:name,1,now())");
                $stmt->execute(array('username' => $userName ,'pass' => $hashpass ,'email' => $email ,'name' => $name));

                // Success Message 
                    $Msg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted </div>';
                    redirectHome($Msg,'back');
                }
            }else{
                $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                redirectHome($Msg);
            }
      

        }elseif($do == 'Edit'){ //Edit Page
        
        //Check if Get Request userID is numeric
        $userID = (isset($_GET['userID']) && is_numeric($_GET['userID'])) ? intval($_GET['userID']) : 0 ;  
        
        //Selec All Data Depend on this ID
        $stmt = $con->prepare("SELECT * FROM Users WHERE userID= ? LIMIT 1");
        
        $stmt->execute(array($userID));
        $row=$stmt->fetch();
        $count=$stmt->rowCount();
        //check if the user exist in database
        if($count > 0){?>
            <h1 class="text-center">Edit Member</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <!-- Start userName Field -->
                    <input type="hidden" name="userID" value="<?php echo $row['userID'] ;?>" />
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Username:</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="username" value="<?php echo $row['userName'];?>" class="form-control" autocomplete="off" requierd="requierd"/>
                        </div>
                    </div>
                    <!-- End userName Field -->
                    <!-- Start Name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="Name" value="<?php echo $row['Name'];?>" class="form-control" requierd="requierd"/>
                        </div>
                    </div>
                    <!-- End Name Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10 col-md-6">
                        <input type="hidden" name="oldpassword" value="<?php echo $row['password'];?>"/>
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="email" name="email" value="<?php echo $row['Email'];?>" class="form-control" requierd="requierd"/>
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Submit Field -->
                    <div class="form-group">
                        
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-primary btn-lg " />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                </form>
            </div>
<?php 
        }else {
            echo "<div class='container'>";
            $Msg = '<div class="alert alert-danger">There Is no Such User</div>';
            redirectHome($Msg);
            echo "</div>";      
        }
    }elseif ($do == 'Update') { //Update Page
        echo "<h1 class='text-center'>Update Member</h1>";
        echo "<div class='container'>";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Get Variables From The Form\
            
            $id=$_POST['userID'];
            $userName=$_POST['username'];
            $name=$_POST['Name'];
            $email=$_POST['email'];

            // Password Trick
            $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

            //Validate Form

            $formErrors = array(); 
            
            if(empty($userName)){

            }

            if(empty($name)){
                
            }

            if(empty($email)){
                
            }

            // Update the database with this info

             $stmt = $con->prepare("UPDATE users SET userName = ?,Email = ?,Name = ?,password = ? WHERE userID=?");
             $stmt->execute(array($userName,$email,$name,$pass,$id));

            // Success Message 

            $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
            
             redirectHome($Msg,'back');

        }else{
            $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
            
            redirectHome($Msg);
            
        }
        echo "</div>";
    }elseif ($do == 'Activate') { //Delete Member Page
        echo "<h1 class='text-center'>Activate Member</h1>";
        echo "<div class='container'>";
            //Check if Get Request userID is numeric
            $userID = (isset($_GET['userID']) && is_numeric($_GET['userID'])) ? intval($_GET['userID']) : 0 ;  
        
            $check = checkItem('userID','Users',$userID);
            //check if the user exist in database
            if($check > 0){
                $stmt=$con->prepare("UPDATE users set regStatus = 1 WHERE userID = ?");
                $stmt->execute(array($userID));
                
                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
                
                redirectHome($Msg);
            }else{
                
                $Msg = '<div class="alert alert-danger">this user doesnt exist</div>' ; 

                redirectHome($Msg);
            }
         echo '</div>';
    }elseif ($do == 'Delete') {
        echo "<h1 class='text-center'>Delete Member</h1>";
        echo "<div class='container'>";
            //Check if Get Request userID is numeric
            $userID = (isset($_GET['userID']) && is_numeric($_GET['userID'])) ? intval($_GET['userID']) : 0 ;  
                    
            $check = checkItem('userID','Users',$userID);
            //check if the user exist in database
            if($check > 0){
                $stmt=$con->prepare("DELETE FROM users WHERE userID = :userID");
                $stmt->bindParam(":userID",$userID);
                $stmt->execute();

                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Deleted </div>';
                
                redirectHome($Msg);
            }else{
                
                $Msg = '<div class="alert alert-danger">this user doesnt exist</div>' ; 

                redirectHome($Msg);
            }
         echo '</div>';
    }
       include  $tpl.'/footer.php';
         
    }else{
        header('Location: index.php');
        exit();
    }

    ob_end_flush();
?>