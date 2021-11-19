<?php

    

    /*
    ================================================
    == Manage Comments Page
    == You Can ADD | EDIT | DELETE | Approve Comments From Here
    ================================================
    */

    ob_start();  //Output Buffering Start

    session_start();

    $pageTitle = 'Comments';

    $noSection='';

    if(isset($_SESSION['userName'])){
        include 'init.php' ; 
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    //start Manage Page
    
    if($do == 'Manage'){//Manage Members Page 
         
        //Select all Users without admin

        $stmt=$con->prepare("SELECT 
                                comments.*,items.Name AS itemName ,users.userName
                            FROM 
                                comments
                            INNER JOIN
                                items
                            ON
                                items.itemID = comments.itemID
                            INNER JOIN
                                users
                            ON
                                users.userID = comments.userID");
        $stmt->execute();

        $rows = $stmt->fetchAll();

    ?><h1 class="text-center">Manage Comments</h1>
        <div class="container">
            <div class="table-responsive">
            <table class="text-center table table-bordered main-table">
                <tr>
                    <td>#ID</td>
                    <td>Comment</td>
                    <td>Item Name</td>
                    <td>User Name</td>
                    <td>Registerd Date</td>
                    <td>Control</td>
                </tr>
<?php foreach($rows as $row) {
                    echo '<tr>';
                        echo '<td>'. $row['cID'] . '</td>';  
                        echo '<td>'. $row['comment'] . '</td>';
                        echo '<td>'. $row['itemName'] . '</td>';
                        echo '<td>'. $row['userName'] . '</td>';
                        echo '<td>'. $row['cDate'] . '</td>'; 
                        echo 
                        "<td>
                        <a href='comments.php?do=Edit&comID=". $row['cID'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                        <a href='comments.php?do=Delete&comID=". $row['cID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

                        if($row['Status'] == 0){
                            echo "<a href='comments.php?do=Approve&comID=". $row['cID'] ."' class='btn btn-info activate'><i class='fa fa-check '></i> Approve</a>";
                        }
                        
                        echo "</td>"; 
                    echo '</tr>';
                }?>
            </table>
            </div>
    </div>
    <?php 
    
    }elseif($do == 'Edit'){ //Edit Page
        
        //Check if Get Request userID is numeric
        $comID = (isset($_GET['comID']) && is_numeric($_GET['comID'])) ? intval($_GET['comID']) : 0 ;  
        
        //Selec All Data Depend on this ID
        $stmt = $con->prepare("SELECT * FROM comments WHERE cID= ?");
        
        $stmt->execute(array($comID));

        $row=$stmt->fetch();
        
        $count=$stmt->rowCount();
        
        //check if the user exist in database
        
        if($count > 0){?>
            <h1 class="text-center">Edit Comment</h1>
            
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <!-- Start Comment Field -->
                    <input type="hidden" name="comID" value="<?php echo $row['cID'] ;?>" />
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Comments:</label>
                        <div class="col-sm-10 col-md-6">
                            <textarea class="form-control" name="comment"><?php echo $row['comment'] ?></textarea>  
                        </div>
                    </div>
                    <!-- End Comment Field -->
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
    }elseif ($do == 'Update') { //Update Comment Page
        echo "<h1 class='text-center'>Update Comment</h1>";
        echo "<div class='container'>";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Get Variables From The Form\
            
            $comID=$_POST['comID'];
            $comment=$_POST['comment'];
            
            // Update the database with this info

             $stmt = $con->prepare("UPDATE comments SET comment = ? WHERE cID=?");
             $stmt->execute(array($comment,$comID));

            // Success Message 

            $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
            
             redirectHome($Msg,'back');

        }else{
            $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
            
            redirectHome($Msg);
            
        }
        echo "</div>";
    }elseif ($do == 'Approve') { 
        echo "<h1 class='text-center'>Approve Comment</h1>";
        echo "<div class='container'>";
            //Check if Get Request userID is numeric
            $comID = (isset($_GET['comID']) && is_numeric($_GET['comID'])) ? intval($_GET['comID']) : 0 ;  
        
            $check = checkItem('cID','comments',$comID);
            //check if the user exist in database
            if($check > 0){
                $stmt=$con->prepare("UPDATE comments set Status = 1 WHERE cID = ?");
                $stmt->execute(array($comID));
                
                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Approved ted </div>';
                
                redirectHome($Msg);
            }else{
                
                $Msg = '<div class="alert alert-danger">this ID doesnt exist</div>' ; 

                redirectHome($Msg,'back');
            }
         echo '</div>';
    }elseif ($do == 'Delete') {//Delete Page
        echo "<h1 class='text-center'>Delete Member</h1>";
        echo "<div class='container'>";
            //Check if Get Request userID is numeric
            $comID = (isset($_GET['comID']) && is_numeric($_GET['comID'])) ? intval($_GET['comID']) : 0 ;  
                    
            $check = checkItem('cID','comments',$comID);
            //check if the user exist in database
            if($check > 0){
                $stmt=$con->prepare("DELETE FROM comments WHERE cID = :comID");
                $stmt->bindParam(":comID",$comID);
                $stmt->execute();

                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Deleted </div>';
                
                redirectHome($Msg);
            }else{
                
                $Msg = '<div class="alert alert-danger">this ID doesnt exist</div>' ; 

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