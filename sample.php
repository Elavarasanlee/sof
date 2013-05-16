<?php
$count = __Select("tbl_call_master","COUNT(DATE(date_time)) AS call_count , DATE(date_time)AS date ",
                       "WHERE DATE(date_time) BETWEEN '$from_date' AND '$to_date' GROUP BY DATE(date_time)");
$get_first_array=array();
$test= array();
while($row = mysql_fetch_array($count))
{
  $record1[]= array(
    $row['date'],
    $row['call_count']
  );
}
$wip=__Select("tbl_call_master","COUNT(DATE(date_time)) AS  call_count , DATE(date_time) AS date ",
                 "WHERE status= 'WIP' AND DATE(date_time) BETWEEN '$from_date' AND '$to_date' 
                 GROUP BY DATE(date_time) ");
while($row= mysql_fetch_array($wip))
{
  $wiprecord[]= array(
    $row['date'],
    $row['call_count']
  );
}
$chk=0;
foreach ( $record1 as  $key=> $value ) {
     if($chk==1){
        $get_first_array[$key] =  $record1[$key];
    }
    foreach ($wiprecord as  $key=> $value1) {
        end($wiprecord);
        $last=key($wiprecord);
        if($key==$last ){
           $chk=1;
        }
        if($value[0] == $value1[0]) {
            array_push($record1[$key], $wiprecord[$key][1]);
            $get_first_array[$key] = $record1[$key];
            print_r( $get_first_array[$key]);
        }
    }
}
/*
 * 1. count($record1) >= count($wip); //Since So you cant use foreach every time.
 * 
 */

?>
