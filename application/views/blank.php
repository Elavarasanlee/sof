<?PHP
$prevRowId = null;
$seatColor = null;
$tableRow = false;
echo "<table width='100%' border='0' cellpadding='3' cellspacing='3'>";
foreach($query as $key=>$result)
{
  $rowId = $result['rowId'];
  $status = $result['status'];
  $columnId = $result['columnId'];
  $updatedby = $result['updatedby'];
  
  if ($prevRowId != $rowId) {
      if ($rowId != 'A') {
        echo "</tr></table></td>";
        echo "\n</tr>";
      }
      $prevRowId = $rowId;
      echo "\n<tr><td align='center'><table border='1' cellpadding='8' cellspacing='8'><tr>";
  } else {
      $tableRow = false;
  }
  if ($status == 0) {
      $seatColor = "lightgreen";
  } else if ($status == 1 && $updatedby == 'user1') {
      $seatColor = "FFCC99";
  } else if ($status == 1 && $updatedby == 'user2') {
      $seatColor = "FFCCFF";
  } else if ($status == 2 && $updatedby == 'user1') {
      $seatColor = "FF9999";
  } else if ($status == 2 && $updatedby == 'user2') {
      $seatColor = "CC66FF";
  } else {
      $seatColor = "red";
  }
  echo "\n<td bgcolor='$seatColor' align='center'>";
  echo "$rowId$columnId";
  if ($status == 0 || ($status == 1)) {
      echo "<input type='checkbox' name='seats[]' value='$rowId$columnId'></checkbox>";
  }
  echo "</td>";
      if (($rowId == 'A' && $columnId == 7)
        || ($rowId == 'B' && $columnId == 9)
        || ($rowId == 'C' && $columnId == 9)
) {


      }
}
echo "</tr></table></td>";
echo "</tr>";
echo "</table>";
?>
<script type="text/javascript">
$(document).ready(function(){
   if (parent.location.hash != '' ) {
     var theCurrentID = parent.location.hash.split('#')[1];
      $.ajax({
            url: 'my.php', //current page
            type: 'post',
            data: {theID: theCurrentID },
            datatype: 'json',
            success: function () {

            }
        });
   }
  // your code here
});
</script>
<?php
   $currentID = $_POST['theID'];
?>