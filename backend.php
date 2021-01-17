<?php
include('db.php');

if (isset($_GET['employe_dataaa'])) {
    $query = mysqli_query($conn,"SELECT * FROM `rexx_test_table` ");
    $query1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(participation_fee) as total FROM `rexx_test_table` "));

     $i=0;
     $arr = array();
     while ($rows = mysqli_fetch_assoc($query)) 
     {
         $user=array(
             "id"=>$rows['id'],
             "participation_id"=>$rows['participation_id'],
             "employee_name"=>$rows['employee_name'],
             "employee_mail"=>$rows['employee_mail'],
             "event_id"=>$rows['event_id'],
             "event_name"=>$rows['event_name'],
             "participation_fee"=>$rows['participation_fee'],
             "event_date"=>$rows['event_date'],
         );
         $arr[$i]=$user;
         $i++;
     }        
     if($arr)
     {
         $content['ResponseText'] = 'OK';
         $content['ResponseMsg'] = 200;
         $content['ResponseData'] =$arr;	
         $content['ResponseTotal'] =$query1['total'];	
     }

     else
     {
         $content['ResponseText'] = 'NO';
         $content['ResponseMsg'] = 3001;
         $content['ResponseData'] ='NULL';	
     }
     print_r(json_encode($content));

}


if (isset($_POST['employe_search'])) {
    
    $empName = $_POST['emp_name'];

    if ($empName !="") {
        $query = mysqli_query($conn,"SELECT * FROM `rexx_test_table` where employee_name='$empName' ");
        $query1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(participation_fee) as total FROM `rexx_test_table` where employee_name='$empName' || employee_name='$empName' "));
    } else {
        $query = mysqli_query($conn,"SELECT * FROM `rexx_test_table` ");
        $query1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(participation_fee) as total FROM `rexx_test_table` "));
    }
    
    $i=0;
    $empName = $_POST['emp_name'];
    $arr = array();
    while ($rows = mysqli_fetch_assoc($query)) 

    {
         $user=array(
             "id"=>$rows['id'],
             "participation_id"=>$rows['participation_id'],
             "employee_name"=>$rows['employee_name'],
             "employee_mail"=>$rows['employee_mail'],
             "event_id"=>$rows['event_id'],
             "event_name"=>$rows['event_name'],
             "participation_fee"=>$rows['participation_fee'],
             "event_date"=>$rows['event_date'],
         );
         $arr[$i]=$user;
         $i++;
     }        
     if($arr)
     {
         $content['ResponseText'] = 'OK';
         $content['ResponseMsg'] = 200;
         $content['ResponseData'] =$arr;
         $content['ResponseTotal'] =$query1['total'];		
     }

     else
     {
         $content['ResponseText'] = 'NO';
         $content['ResponseMsg'] = 3001;
         $content['ResponseData'] ='NULL';	
     }
    //  print_r($content);
     print_r(json_encode($content));

}

if (isset($_POST['fileSubmit'])) {
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    
    $data = file_get_contents($_FILES['file']['tmp_name']);
    // $data = file_get_contents($file_name);
    $Decodata = json_decode($data);
    foreach ($Decodata as $value) {
        $query = mysqli_query($conn,"INSERT INTO `rexx_test_table`(`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`) VALUES ('$value->participation_id','$value->employee_name','$value->employee_mail','$value->event_id','$value->event_name','$value->participation_fee','$value->event_date')");

    }
    echo "submited";
    }
?>