<?php
    
     /*
    ================================================
    == Items Page
    ================================================
    */

    
    ob_start();  //Output Buffering Start

    session_start();
    
    $pageTitle = 'Items';

    $noSection = '';

    if(isset($_SESSION['userName'])){

        include 'init.php' ; 
        
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage'){

            $stmt=$con->prepare("SELECT 
                                    items.*,categories.Name AS catName,users.userName
                                FROM 
                                    items
                                INNER JOIN
                                    categories
                                ON
                                    categories.ID = items.catID
                                INNER JOIN
                                    users
                                ON
                                    users.userID = items.memberID");
            $stmt->execute();
    
            $items = $stmt->fetchAll();

            if (! empty($items)){
    
                ?><h1 class="text-center">Manage Items</h1>
                    <div class="container">
                        <div class="table-responsive">
                        <table class="text-center table table-bordered main-table">
                            <tr>
                                <td>#ID</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Adding Date</td>
                                <td>Category</td>
                                <td>Username</td>
                                <td>Control</td>
                            </tr>
                            <?php 
                                foreach($items as $item) {
                                echo '<tr>';
                                    echo '<td>'. $item['itemID'] . '</td>';  
                                    echo '<td>'. $item['Name'] . '</td>';
                                    echo '<td>'. $item['Description'] . '</td>';
                                    echo '<td>'. $item['Price'] . '</td>';
                                    echo '<td>'. $item['addDate'] . '</td>';
                                    echo '<td>'. $item['catName'] . '</td>';
                                    echo '<td>'. $item['userName'] . '</td>'; 
                                    echo 
                                    "<td>
                                    <a href='items.php?do=Edit&itemID=". $item['itemID'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                    <a href='items.php?do=Delete&itemID=". $item['itemID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                    if($item['Approve'] == 0){
                                        echo "<a href='items.php?do=Approve&itemID=". $item['itemID'] ."' class='btn btn-info activate'><i class='fa fa-check '></i> Approve</a>";
                                    }
                                    
                                    echo "</td>";
                                echo '</tr>';
                            }?>
                        </table>
                        </div>
                    <a href="items.php?do=Add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Item</a> 
                </div>
        <?php   }  else {
                echo '<div class="container">';
                    echo '<div class="nice-message">There\'s No Record To Show</div>';
                    echo  '<a href="items.php?do=Add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Item</a>';
                    echo '</div>';
                }

        } elseif ($do == 'Add'){?>

            <h1 class="text-center">Add New Item</h1>
            <div class="container">
            <form class="form-horizontal" action="?do=Insert" method="POST">
                <!-- Start Name Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Name:</label>
                    <div class="col-sm-8 col-md-6 ">
                        <input type="text" name="name"  class="form-control" requierd="requierd" placeholder="Name"/>
                    </div>
                </div>
                <!-- End Name Field -->
                <!-- Start Description Field -->
                 <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Description:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="description"  class="form-control" requierd="requierd" placeholder="Description of The Item"/>
                    </div>
                </div>
                <!-- End Description Field -->
                <!-- Start Price Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Price:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="price"  class="form-control" requierd="requierd" placeholder="Price of The Item"/>
                    </div>
                </div>
                <!-- End Price Field -->
                <!-- Start Country Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Country:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="country"  class="form-control" requierd="requierd" placeholder="Made In"/>
                    </div>
                </div>
                <!-- End Country Field -->
                <!-- Start Status Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Status:</label>
                    <div class="col-sm-8 col-md-6">
                        <select class="form-control" name="status">
                            <option value="0">...</option>
                            <option value="1">New</option>
                            <option value="2">Like New</option>
                            <option value="3">Used</option>
                            <option value="4">Very Old</option>
                        </select>
                    </div>
                </div>
                <!-- End Status Field -->
                <!-- Start Members Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Member:</label>
                    <div class="col-sm-8 col-md-6">
                        <select class="form-control" name="member">
                            <option value="0">...</option>
                            <?php
                                $stmt = $con->prepare("select * FROM users");
                                $stmt->execute();
                                $users = $stmt -> fetchAll();
                                foreach($users as $user){
                                    echo '<option value="' . $user['userID'] . '">'. $user['userName'] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- End Members Field -->
                <!-- Start Categories Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Categorie:</label>
                    <div class="col-sm-8 col-md-6">
                        <select class="form-control" name="category">
                            <option value="0">...</option>
                            <?php
                                $stmt2 = $con->prepare("select * FROM categories");
                                $stmt2->execute();
                                $cats = $stmt2 -> fetchAll();
                                foreach($cats as $cat){
                                    echo '<option value="' . $cat['ID'] . '">'. $cat['Name'] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- End Categories Field -->

                <!-- Start Submit Field -->
                <div class="form-group">
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Add Item" class="btn btn-primary btn-sm " />
                    </div>
                </div>
                <!-- End Submit Field -->
            </form>
        </div>

            <?php

        } elseif ($do == 'Insert'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'>Insert Item</h1>";
                
                //Get Variables From The Form\
                
                $Name=$_POST['name'];
                $desc=$_POST['description'];
                $Price=$_POST['price'];
                $Country=$_POST['country'];
                $Status=$_POST['status'];
                $memberID=$_POST['member'];
                $catID=$_POST['category'];
                
                //Validate Form

                $formErrors = array(); 
                
                if(empty($Name)){
                    $formErrors[] = 'Name can\'t be <Strong>Empty</strong> '; 
                }

                if(empty($desc)){
                    $formErrors[] = 'Description can\'t be <Strong>Empty</strong> ';
                }

                if(empty($Price)){
                    $formErrors[] = 'Price can\'t be <Strong>Empty</strong> ';
                }

                if(empty($Country)){
                    $formErrors[] = 'Country can\'t be <Strong>Empty</strong> ';
                }

                if($Status == 0){
                    $formErrors[] = 'You Must Choose the <Strong>Status</strong> ';
                }
                
                
                foreach($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>' ;
                }

                if(empty($formErrors)){
                

                // Insert Users Info In Database

                $stmt = $con->prepare("INSERT INTO items(Name,Description,Price,madeIn,Status,memberID,catID,addDate) Values(:name,:desc,:price,:country,:status,:memberID,:catID,now())");
                $stmt->execute(array('name' => $Name ,'desc' => $desc ,'price' => $Price ,'country' => $Country,'status' => $Status,'memberID' => $memberID,'catID' => $catID));

                // Success Message 
                    $Msg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted </div>';
                    redirectHome($Msg,'back');
                }
                
                
            }else{
                $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                redirectHome($Msg);
            }
      
        } elseif ($do == 'Edit'){

        //Check if Get Request itemID is numeric
        $itemID = (isset($_GET['itemID']) && is_numeric($_GET['itemID'])) ? intval($_GET['itemID']) : 0 ;  
        
        //Selec All Data Depend on this ID
        $stmt = $con->prepare("SELECT * FROM items WHERE itemID= $itemID");
        
        $stmt->execute();
        
        $item=$stmt->fetch();
        
        $count=$stmt->rowCount();
        //check if the user exist in database
        if($count > 0){?>

                <h1 class="text-center">Edit Item</h1>
                <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                <input type="hidden" name="itemID" value="<?php echo $item['itemID'] ;?>" />
                    <!-- Start Name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Name:</label>
                        <div class="col-sm-8 col-md-6 ">
                            <input type="text" name="name"  class="form-control" requierd="requierd" placeholder="Name" value="<?php echo $item['Name'] ?>"/>
                        </div>
                    </div>
                    <!-- End Name Field -->
                    <!-- Start Description Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Description:</label>
                        <div class="col-sm-8 col-md-6">
                            <input type="text" name="description"  class="form-control" requierd="requierd" placeholder="Description of The Item" value="<?php echo $item['Description'] ?>"/>
                        </div>
                    </div>
                    <!-- End Description Field -->
                    <!-- Start Price Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Price:</label>
                        <div class="col-sm-8 col-md-6">
                            <input type="text" name="price"  class="form-control" requierd="requierd" placeholder="Price of The Item" value="<?php echo $item['Price'] ?>"/>
                        </div>
                    </div>
                    <!-- End Price Field -->
                    <!-- Start Country Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Country:</label>
                        <div class="col-sm-8 col-md-6">
                            <input type="text" name="country"  class="form-control" requierd="requierd" placeholder="Made In" value="<?php echo $item['madeIn'] ?>"/>
                        </div>
                    </div>
                    <!-- End Country Field -->
                    <!-- Start Status Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Status:</label>
                        <div class="col-sm-8 col-md-6">
                            <select class="form-control" name="status">
                                
                                <option value="1" <?php if ($item['Status']==1) { echo 'selected' ;} ?>>New</option>
                                <option value="2" <?php if ($item['Status']==2) { echo 'selected' ;} ?>>Like New</option>
                                <option value="3" <?php if ($item['Status']==3) { echo 'selected' ;} ?>>Used</option>
                                <option value="4" <?php if ($item['Status']==4) { echo 'selected' ;} ?>>Very Old</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Status Field -->
                    <!-- Start Members Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Member:</label>
                        <div class="col-sm-8 col-md-6">
                            <select class="form-control" name="member">
                                
                                <?php
                                    $stmt = $con->prepare("select * FROM users");
                                    $stmt->execute();
                                    $users = $stmt -> fetchAll();
                                    foreach($users as $user){
                                        echo '<option value="' . $user['userID'] . '"'; if ($item['memberID']==$user['userID']) { echo 'selected' ;} echo '>'. $user['userName'] .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- End Members Field -->
                    <!-- Start Categories Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Categorie:</label>
                        <div class="col-sm-8 col-md-6">
                            <select class="form-control" name="category">
                                
                                <?php
                                    $stmt2 = $con->prepare("select * FROM categories");
                                    $stmt2->execute();
                                    $cats = $stmt2 -> fetchAll();
                                    foreach($cats as $cat){
                                        echo '<option value="' . $cat['ID'] . '"' ; if ($item['catID']==$cat['ID']) { echo 'selected' ;} echo '>'. $cat['Name'] .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- End Categories Field -->
                    <!-- Start Submit Field -->
                    <div class="form-group">
                        
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save Item" class="btn btn-primary btn-sm " />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                    </form>
                    <?php
                        //Select all Users without admin

            $stmt=$con->prepare("SELECT 
                                    comments.*,users.userName
                                FROM
                                    comments
                                INNER JOIN
                                    users
                                ON
                                    users.userID = comments.userID
                                WHERE
                                    itemID = ?");
            $stmt->execute(array($itemID));

            $rows = $stmt->fetchAll();

            if(! empty($rows)){

            
        ?><h1 class="text-center"> Manage [<?php echo $item['Name'] ?>] Comments </h1>
           
                <div class="table-responsive">
                <table class="text-center table table-bordered main-table">
                    <tr>
                        
                        <td>Comment</td>
                        <td>User Name</td>
                        <td>Registerd Date</td>
                        <td>Control</td>
                    </tr>
    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>'. $row['comment'] . '</td>';
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
                <?php } ?>
            </div>
            
        <?php 
        }else {
            echo "<div class='container'>";
            $Msg = '<div class="alert alert-danger"> There Is no Such </div>';
            redirectHome($Msg);
            echo "</div>";      
        }

        } elseif ($do == 'Update'){

                
            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                //Get Variables From The Form\
                
                $itemID=$_POST['itemID'];
                $Name=$_POST['name'];
                $desc=$_POST['description'];
                $Price=$_POST['price'];
                $Country=$_POST['country'];
                $Status=$_POST['status'];
                $member=$_POST['member'];
                $category=$_POST['category'];
    
               
                //Validate Form
    
                $formErrors = array(); 
                
                if(empty($Name)){
                    $formErrors[] = 'Name can\'t be <Strong>Empty</strong> '; 
                }

                if(empty($desc)){
                    $formErrors[] = 'Description can\'t be <Strong>Empty</strong> ';
                }

                if(empty($Price)){
                    $formErrors[] = 'Price can\'t be <Strong>Empty</strong> ';
                }

                if(empty($Country)){
                    $formErrors[] = 'Country can\'t be <Strong>Empty</strong> ';
                }

                if($Status == 0){
                    $formErrors[] = 'You Must Choose the <Strong>Status</strong> ';
                }
                
                
                foreach($formErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>' ;
                }

                if (empty($formErrors)) {
                    // Update the database with this info
        
                    $stmt = $con->prepare("UPDATE items SET Name = ?,Description = ?,Price = ?,madeIn = ?,Status = ?,catID = ?,memberID = ? WHERE itemID=?");
                    $stmt->execute(array($Name,$desc,$Price,$Country,$Status,$category,$member,$itemID));
        
                    // Success Message 
        
                    $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
                    
                    redirectHome($Msg,'back');
                }
    
            }else{
                $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                
                redirectHome($Msg);
                
            }
            echo "</div>";

        } elseif ($do == 'Delete'){

            echo "<h1 class='text-center'>Delete Item</h1>";
            echo "<div class='container'>";
                //Check if Get Request itemID is numeric
                $itemID = (isset($_GET['itemID']) && is_numeric($_GET['itemID'])) ? intval($_GET['itemID']) : 0 ;  
                        
                $check = checkItem('itemID','items',$itemID);
                //check if the user exist in database
                if($check > 0){
                    $stmt=$con->prepare("DELETE FROM items WHERE itemID = :itemID");
                    $stmt->bindParam(":itemID",$itemID);
                    $stmt->execute();
    
                    $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Deleted </div>';
                    
                    redirectHome($Msg,'back');
                }else{
                    
                    $Msg = '<div class="alert alert-danger">this ID is Not Exist</div>' ; 
    
                    redirectHome($Msg);
                }
             echo '</div>';

        } elseif ($do == 'Approve'){
            echo "<h1 class='text-center'>Approve Item</h1>";
            echo "<div class='container'>";
                //Check if Get Request itemID is numeric
                $itemID = (isset($_GET['itemID']) && is_numeric($_GET['itemID'])) ? intval($_GET['itemID']) : 0 ;  
            
                $check = checkItem('itemID','items',$itemID);
                //check if the user exist in database
                if($check > 0){
                    $stmt=$con->prepare("UPDATE items set Approve = 1 WHERE itemID = ?");
                    $stmt->execute(array($itemID));
                    
                    $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
                    
                    redirectHome($Msg);
                }else{
                    
                    $Msg = '<div class="alert alert-danger">this user doesnt exist</div>' ; 
    
                    redirectHome($Msg);
                }
             echo '</div>';

        }

        include $tpl . 'footer.php' ;
    }else{
        header('Location: index.php');

        exit();
    }

    ob_end_flush();

?>