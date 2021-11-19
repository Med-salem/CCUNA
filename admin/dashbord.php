<?php
   
    ob_start(); //Output Buffering Start 
    
    session_start();
    if(isset($_SESSION['userName'])){
        $noSection = '';
        $pageTitle = 'Dashbord';
        include 'init.php';
        
        $latestUsers = 5;// Number Of Latest Users

        $theLatest = getLatest("*","users","userID",$latestUsers);// Latest Users Array
        
        $numItems = 5; // Number Of Latest Items

        $latestItems = getLatest("*","items","itemID",$numItems);// Latest items Array
        
        ?>

        <div class="container home-stats text-center">
            <h1>Dashbord</h1>
            <div class="col-md-3 ">
                <div class="Stat st-members">
                    <i class="fa fa-users"></i>
                    <div class="info">
                    Total Members
                    <span><a href="members.php"><?php echo countItems('userID','users'); ?></a></span>
                
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="Stat st-pending">
                    <i class="fa fa-user-plus"></i>
                    <div class="info">
                        Pending Members
                        <span><a href="members.php?page=Pending"><?php echo checkItem('regStatus','users', 0) ;?></a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="Stat st-items">
                    <i class="fa fa-tag"></i>
                    <div class="info">
                        Total Items
                        <span><a href="items.php"><?php echo countItems('itemID','items'); ?></a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="Stat st-comments">
                    <i class="fa fa-comments"></i>
                    <div class="info">
                        Total Comments
                        <span><a href="comments.php"><?php echo countItems('cID','comments'); ?></a></span>                    </div>
                </div>
            </div>
        </div>

        <div class="container latest">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Latest <?php echo $latestUsers; ?> Register Users
                        <span class="toggle-info pull-right">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>  
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled latest-users">
                        <?php
                            if (! empty($theLatest)){
                                foreach ($theLatest as $user){
                                    echo '<li>'.$user['userName'] . '<a href="members.php?do=Edit&userID='. $user['userID'] .'"><span class="btn btn-success pull-right"><i class="fa fa-edit"></i>Edit'; 
                                    if($user['regStatus'] == 0) {
                                        echo "<a href='members.php?do=Activate&userID=". $user['userID'] ."' class='btn btn-info pull-right activate'><i class='fa fa-check'></i> Activate</a>";
                                    }
                                    echo '</span></a></li>' ;
                                }
                            } else {
                                echo 'There\'s No Members To Show';
                            }
                        ?>
                        </ul>
                    </div>    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-tag"></i> Latest Items
                        <span class="toggle-info pull-right">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>   
                    </div>
                    <div class="panel-body">
                    <ul class="list-unstyled latest-users">
                        <?php
                        if (! empty($latestItems)){
                            foreach ($latestItems as $item){
                                echo '<li>'.$item['Name'] . '<a href="items.php?do=Edit&itemID='. $item['itemID'] .'"><span class="btn btn-success pull-right"><i class="fa fa-edit"></i>Edit'; 
                                if($item['Approve'] == 0){
                                    echo "<a href='items.php?do=Approve&itemID=". $item['itemID'] ."' class='btn btn-info pull-right activate'><i class='fa fa-check'></i> Approve</a>";
                                }
                                echo '</span></a></li>' ;
                            }
                        } else {
                            echo 'There\'s No Items To Show';
                        }
                        ?>
                        </ul>
                    </div> 
                </div>
            </div>

            <!--Start Latest Comments--> 
            <div class="col-sm-6">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">
                        <i class="fa fa-comments-o"></i> Latest Comments
                        <span class="toggle-info pull-right">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>  
                    </div>
                    <div class="panel-body">
       
                    <?php

                            $stmt=$con->prepare("SELECT 
                                                    comments.*,users.userName
                                                FROM
                                                    comments
                                                INNER JOIN
                                                    users
                                                ON
                                                    users.userID = comments.userID
                                                ");
                            $stmt->execute();
                            $comments = $stmt->fetchAll();
                            if (! empty($comments)){
                                foreach ($comments as $comment) {
                                    echo '<div class="comment-box">';
                                        echo '<span class="member-n">' . $comment['userName'] . '</span>';
                                        echo '<span class="member-c">' . $comment['comment'] . '</span>';
                                    echo '</div>';
                                }
                            } else {
                                echo 'There\'s No Comments To Show';
                            }
                    ?>
                    </div>    
                </div>
            </div>

             
            </div>
                        <!--Start Latest Comments--> 
        <div>
        <?php
       include  $tpl.'/footer.php';
         
    }else{
        header('Location: index.php');
        exit();
    }

    ob_end_flush();
?>