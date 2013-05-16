<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Time Zone Experiment</title>
        <style type="text/css">
            label{font-weight: bold;}
        </style>
    </head>
    <body>
        <?php
            echo 'Date & Time: '.mdate($datestring, $gmt_to_local).br(); $data=array('name'=>'tz-dst','id'=>'tz-dst','value'=>'TRUE','checked'=>FALSE);
            echo form_open();
                echo form_label('Select Your Time-zone: ','tz-select').timezone_menu('UP55','tz-select').br();
                echo form_label('Day-Light-Savings(DST): ','tz-dst').  form_checkbox($data).br();
                echo form_submit('set_tz','Set Time Zone');
            echo form_close();
        ?>
    </body>
</html>
