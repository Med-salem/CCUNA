<?php

    /*
    ** Page Title Function
    */
    function setTitle() {
        global $pageTitle;

        $pageTitle = isset($pageTitle) ? $pageTitle : 'Default' ;
        echo $pageTitle;
    }

    /*
    ** Home Redirect Function V2.0
    ** $Msg = Echo The Message ¨[Error | success | Warning ]
    ** $url = The Link You Want To Redirect To
    ** $seconds = Seconds Before Redirecting 
    */

    function redirectHome($Msg, $url = null ,$seconds = 3) {

            if ($url === null) {
                $url = 'index.php' ;
                $link = 'Homepage';
            }else {

                $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : 'index.php' ;
                $link = $url === 'index.php' ? 'Homepage' : 'Previous Page' ;
            }
            echo $url; 
            echo $link;
            echo $Msg;
            echo "You\'ll be Redirected to $link After $seconds secs. If not, Click <a href=$url>here</a>";
            header("refresh:$seconds;url=$url");

            exit();
    }

    /*
    ** Function Check Items in Database
    ** $select = The Item To Select
    ** $from = The Table To Select From 
    ** $value = The Value Of Select 
    */

    function checkItem($select,$from,$value){
        global $con ;

        $statement = $con-> prepare("SELECT $select FROM $from WHERE $select= ?");
 
        $statement->execute(array($value));

        $count =  $statement->rowCount(); 

        return $count;
    }



    /*
    ** Count Number of Items Rows
    ** $select = The Item To Select
    ** $from = The Table To Select From 
    **  
    */

    function countItems($item,$table) {

        global $con;
        $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

        $stmt2->execute();

        return $stmt2->fetchColumn();
    }



     /*
    ** Get Latest Records Function v1.0
    ** Function To Get Latest Items From Database [Users,Items,Comments]
    ** $select = The Item To Select
    ** $from = The Table To Select From 
    **  
    */


    function getLatest($select,$table,$order,$limit = 5) {
        global $con;

        $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

        $getStmt->execute();

        $rows = $getStmt->fetchAll();

        return $rows;
    }
?>
    