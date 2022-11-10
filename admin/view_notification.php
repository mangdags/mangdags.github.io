<h1>Notifications</h1>

<?php
    
    include("asset/include/config.php");

    $id = $_GET['id'];

    $query ="UPDATE notifications SET status = 'read' WHERE id = $id";
    performQuery($query);

    $query = "SELECT * FROM notifications WHERE id = $id";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type'] == 'approval'){
                echo ucfirst($i['name'])." supplier account needs to be approved. <br/>".$i['date'];
            }else{
            }
        }
    }
    
?><br/>
<a href="index.php">Back</a>