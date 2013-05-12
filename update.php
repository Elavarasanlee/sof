<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');
if($mysqli->connect_errno) { die('Unable to connect to database. Following error occured: '.  $mysqli->connect_error); }
$query = 'SELECT * FROM `org`';
$run = $mysqli->query($query);
if(!$run) { die('Some error occured. '.  $mysqli->connect_error); }
$result = array();
if($run->num_rows>0) {
    while ($row = $run->fetch_object()) { $result[] = $row; }
    $run->close();
}
if(isset($_POST['org_select']) && !empty($_POST['org_select'])) {
    $org_id = $_POST['org_select'];
    $query = "SELECT * FROM `org` WHERE `id` = '$org_id' LIMIT 1";
    $run = $mysqli->query($query);
    if(!$run) { die('Some error occured. '.  $mysqli->connect_error); }
    $org_details = array();
    if($run->num_rows>0) {
        while ($row = $run->fetch_object()) { $org_details[] = $row; }
        $run->close();
        $org_details = $org_details[0];
    }
}
if(isset($_POST['update'])) {
    //Handle Update queries here, either using input field - name or using hidden field - id.
}
$mysqli->close();
?>
<html>
    <head>
        <title>Update Details</title>
    </head>
    <style type="text/css">
        label{font-weight: bolder;}
    </style>
    <body>
        <form id="org_sel_form" name="org_sel_form" method="post" action="">
            <label for="org_select">Select an Organization to Update Details :</label><br/>
            <select id="org_select" name="org_select">
                <option value="">Select an Organization</option>
             <?php foreach ($result as $key=>$val): ?>
                <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
             <?php endforeach; ?>
            </select>
            <noscript>
                <input type="submit" name="submit" value="Get Details" form="org_sel_form"/>
            </noscript>
        </form>
        <?php if(isset($org_details) && !empty($org_details)): ?>
            <form name="update-org-form" id="update-org-form" method="post" action="">
                <input type="hidden" name="id" value="<?php echo $org_details->id;?>" for="update-org-form" />
                <pre>
                Name      <input type="text" name="name" disabled="" value="<?php echo $org_details->name;?>" for="update-org-form" />
                Telephone <input type="text" name="telephone" value="<?php echo $org_details->telephone;?>" for="update-org-form" />
                <!-- So on.. -->
                <input type="submit" name="update" id="update" value="Update" for="update-org-form" />
                </pre>
            </form>
        <?php endif; ?>
    </body>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#org_select").change(function(){
            var selected_val = $("#org_select").val();
            if(selected_val != "")
                $("#org_sel_form").submit();
            else
                alert('FFF');
        });
    </script>
</html>