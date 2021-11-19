<?php
    
     /*
    ================================================
    == Category Page
    ================================================
    */

    
    ob_start();  //Output Buffering Start

    session_start();
    
    $pageTitle = 'Categories';

    $noSection = '';

    if(isset($_SESSION['userName'])){

        include 'init.php' ; 
        
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage'){

            $sort = 'ASC'; 
            
            $sort_array = array('ASC','DESC');

            if(isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)){
                
                $sort =$_GET['sort'];
            
            }

           $stmt = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort") ;

           $stmt->execute();

           $cats = $stmt->fetchAll(); ?>
                <h1 class="text-center">Manage Categories</h1>
                <div class="container categories">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-edit"></i>Manage Categories
                        <div class="option pull-right">
                        <i class="fa fa-sort"></i>Ordering: [
                    <a class="<?php if($sort == 'ASC') {echo 'active';}  ?>" href="?sort=ASC">Asc</a> |
                    <a class="<?php if($sort == 'DESC') {echo 'active';} ?>" href="?sort=DESC">Desc</a> ]
                    <i class="fa fa-eye"></i>View: [
                    <span class="active" data-view="full">Full</span> |
                    <span data-view="classic">Classic</span> ]
                    
                </div> 
                    </div>   
                        <div class="panel-body">
                                <?php
                                    foreach($cats as $cat){
                                        echo "<div class='cat'>";
                                            echo "<div class='hidden-buttons'>";
                                                echo "<a href='categories?do=Edit&catID=". $cat['ID'] ."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i>Edit</a> ";
                                                echo "<a href='categories?do=Delete&catID=". $cat['ID'] ."' class='confirm btn btn-xs btn-danger'><i class='fa fa-close'></i>Delete</a> ";
                                            echo "</div>";
                                            echo "<h3>" . $cat['Name'] . "</h3>";
                                                echo "<div class='full-view'>";
                                                    echo '<p>';if($cat['Description'] != ''){echo $cat['Description'];}else{ echo 'this Category has no Description';}echo '</p>';
                                                    if($cat['Visibility'] == 1) {echo '<span class="visibility"><i class="fa fa-eye"></i> Hidden</span>';}
                                                    if($cat['Allow_Comment'] == 1) {echo '<span class="commenting"><i class="fa fa-close"></i> Comment Disabled</span>';}
                                                    if($cat['Allow_ads'] == 1) {echo '<span class="advertises"><i class="fa fa-close"></i> Ads Disabled</span>';}
                                                echo "</div>";   
                                            echo '</div>';
                                        echo "<hr>";
                                    }
                                ?>
                            </div>
                    </div>
                    <a class="add-category btn btn-primary" href="categories.php?do=Add"><i class="fa fa-plus"></i> Add New Category</a>
                </div>

            <?php

        } elseif ($do == 'Add'){ ?>
            
            <h1 class="text-center">Add New Category</h1>
        <div class="container">
            <form class="form-horizontal" action="?do=Insert" method="POST">
                <!-- Start Name Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Name:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="name"  class="form-control" autocomplete="off" requierd="requierd" placeholder="Name"/>
                    </div>
                </div>
                <!-- End Name Field -->
                <!-- Start Description Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Description:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="description" class="form-control"  requierd="requierd" placeholder="Descrbe the Category" />
                    </div>
                </div>
                <!-- End Description Field -->
                <!-- Start Ordering Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Ordering:</label>
                    <div class="col-sm-8 col-md-6">
                        <input type="text" name="ordering" class="form-control" placeholder="Number To Arrange The Categories"/>
                    </div>
                </div>
                <!-- End Ordering Field -->
                <!-- Start Visibility Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Visibile:</label>
                    <div class="col-sm-8 col-md-6">
                        <div>
                            <input id="vis-yes" type="radio" name="visibility" value="0" checked/>  
                            <label for="vis-yes">Yes</label>
                        </div> 
                        <div>
                            <input id="vis-no" type="radio" name="visibility" value="1" />  
                            <label for="vis-no">No</label>
                        </div>    
                    </div>
                </div>
                <!-- End Visibility Field -->
                <!-- Start Commenting Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Allow Commenting:</label>
                    <div class="col-sm-8 col-md-6">
                        <div>
                            <input id="com-yes" type="radio" name="commenting" value="0" checked/>  
                            <label for="com-yes">Yes</label>
                        </div> 
                        <div>
                            <input id="com-no" type="radio" name="commenting" value="1" />  
                            <label for="com-no">No</label>
                        </div>    
                    </div>
                </div>
                <!-- End Commenting Field -->
                <!-- Start Ads Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Allow Ads:</label>
                    <div class="col-sm-8 col-md-6">
                        <div>
                            <input id="ads-yes" type="radio" name="ads" value="0" checked/>  
                            <label for="ads-yes">Yes</label>
                        </div> 
                        <div>
                            <input id="ads-no" type="radio" name="ads" value="1" />  
                            <label for="ads-no">No</label>
                        </div>    
                    </div>
                </div>
                <!-- End Ads Field -->
                <!-- Start Submit Field -->
                <div class="form-group">
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Add Category" class="btn btn-primary btn-lg " />
                    </div>
                </div>
                <!-- End Submit Field -->
            </form>
        </div>

            <?php 
        } elseif ($do == 'Insert'){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'>Insert Category</h1>";
                
                //Get Variables From The Form\
                
                $Name=$_POST['name'];
                $desc=$_POST['description'];
                $order=$_POST['ordering'];
                $visibile=$_POST['visibility'];
                $comment=$_POST['commenting'];
                $ads=$_POST['ads'];
                
                

                //Check If Category Exist in Database

                $check = checkItem("Name","categories",$Name);

                if($check == 1){

                    $Msg = '<div class="alert alert-danger">Sorry This Category Is Exist</div>';
                    redirectHome($Msg,'back');

                }else{

                // Insert Category Info In Database

                $stmt = $con->prepare("INSERT INTO categories(Name,Description,Ordering,Visibility,Allow_Comment,Allow_ads) Values(:name,:desc,:order,:visibile,:comment,:ads)");
                $stmt->execute(array('name' => $Name ,'desc' => $desc ,'order' => $order ,'visibile' => $visibile,'comment' => $comment,'ads' => $ads));

                // Success Message 
                    $Msg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted </div>';
                    redirectHome($Msg,'back');
                }
            }else{
                $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                redirectHome($Msg,'back');
            }
        
        

        } elseif ($do == 'Edit'){
            //Check if Get Request catID is numeric
            $catID = (isset($_GET['catID']) && is_numeric($_GET['catID'])) ? intval($_GET['catID']) : 0 ;  
            
            //Selec All Data Depend on this ID
            $stmt = $con->prepare("SELECT * FROM categories WHERE ID= ? ");
            
            $stmt->execute(array($catID));
            
            $cat=$stmt->fetch();
            //Row Count
            $count=$stmt->rowCount();
            //check if the user exist in database
            if($count > 0){?>

                <h1 class="text-center">Edit Category</h1>
                <div class="container">
                    <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="hidden" name="catID" value="<?php echo $catID ;?>" />
                        <!-- Start Name Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Name:</label>
                            <div class="col-sm-8 col-md-6">
                                <input type="text" name="name"  class="form-control" requierd="requierd" placeholder="Name" value="<?php echo $cat['Name']; ?>"/>
                            </div>
                        </div>
                        <!-- End Name Field -->
                        <!-- Start Description Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Description:</label>
                            <div class="col-sm-8 col-md-6">
                                <input type="text" name="description" class="form-control" placeholder="Describe the Category" value="<?php echo $cat['Description']; ?>" />
                            </div>
                        </div>
                        <!-- End Description Field -->
                        <!-- Start Ordering Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Ordering:</label>
                            <div class="col-sm-8 col-md-6">
                                <input type="text" name="ordering" class="form-control" placeholder="Number To Arrange The Categories" value="<?php echo $cat['Ordering']; ?>"/>
                            </div>
                        </div>
                        <!-- End Ordering Field -->
                        <!-- Start Visibility Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Visibile:</label>
                            <div class="col-sm-8 col-md-6">
                                <div>
                                    <input id="vis-yes" type="radio" name="visibility" value="0" <?php if($cat['Visibility'] == 0) { echo 'checked';} ?>/>  
                                    <label for="vis-yes">Yes</label>
                                </div> 
                                <div>
                                    <input id="vis-no" type="radio" name="visibility" value="1" <?php if($cat['Visibility'] == 1) { echo 'checked';} ?>/>  
                                    <label for="vis-no">No</label>
                                </div>    
                            </div>
                        </div>
                        <!-- End Visibility Field -->
                        <!-- Start Commenting Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Allow Commenting:</label>
                            <div class="col-sm-8 col-md-6">
                                <div>
                                    <input id="com-yes" type="radio" name="commenting" value="0" <?php if($cat['Allow_Comment'] == 0) { echo 'checked';} ?> />  
                                    <label for="com-yes">Yes</label>
                                </div> 
                                <div>
                                    <input id="com-no" type="radio" name="commenting" value="1" <?php if($cat['Allow_Comment'] == 1) { echo 'checked';} ?>/>  
                                    <label for="com-no">No</label>
                                </div>    
                            </div>
                        </div>
                        <!-- End Commenting Field -->
                        <!-- Start Ads Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-4 control-label">Allow Ads:</label>
                            <div class="col-sm-8 col-md-6">
                                <div>
                                    <input id="ads-yes" type="radio" name="ads" value="0" <?php if($cat['Allow_ads'] == 0) { echo 'checked';} ?> />  
                                    <label for="ads-yes">Yes</label>
                                </div> 
                                <div>
                                    <input id="ads-no" type="radio" name="ads" value="1" <?php if($cat['Allow_ads'] == 1) { echo 'checked';} ?>/>  
                                    <label for="ads-no">No</label>
                                </div>    
                            </div>
                        </div>
                        <!-- End Ads Field -->
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
        } elseif ($do == 'Update'){
            
            echo "<h1 class='text-center'>Update Category</h1>";
            echo "<div class='container'>";
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Get Variables From The Form\
                
                $id=$_POST['catID'];
                $Name=$_POST['name'];
                $Description=$_POST['description'];
                $Ordering=$_POST['ordering'];
                
                $Visibility=$_POST['visibility'];
                $Commenting=$_POST['commenting'];
                $Ads=$_POST['ads'];

                // Update the database with this info

                $stmt = $con->prepare("UPDATE categories SET Name = ?,Description = ?,Ordering = ?,Visibility = ?,Allow_Comment = ?,Allow_ads = ? WHERE ID=?");
                $stmt->execute(array($Name,$Description,$Ordering,$Visibility,$Commenting,$Ads,$id));

                // Success Message

                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Updated </div>';
                
                redirectHome($Msg,'back');

            }else{
                $Msg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
                
                redirectHome($Msg);
                
            }
            echo "</div>";

        } elseif ($do == 'Delete'){
            echo "<h1 class='text-center'>Delete Member</h1>";
        echo "<div class='container'>";
            //Check if Get Request catID is numeric
            $catID = (isset($_GET['catID']) && is_numeric($_GET['catID'])) ? intval($_GET['catID']) : 0 ;  
                   
            $check = checkItem('ID','categories',$catID);
            //check if the user exist in database
            if($check > 0){
                $stmt=$con->prepare("DELETE FROM categories WHERE ID = :catID");
                $stmt->bindParam(":catID",$catID);
                $stmt->execute();

                $Msg = "<div class='alert alert-success'> " . $stmt->rowCount() . ' Record Deleted </div>';
                
                redirectHome($Msg,'back');
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