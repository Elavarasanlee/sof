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
            $is_def_tz = ($isdef_timezone !== FALSE) ? 
                ' - Your currect timezone is set as UTC '. (intval($isdef_timezone)>0 ? '+ '.$isdef_timezone : $isdef_timezone) .' hrs.' 
              : ' - Your currect timezone is set as UTC.';
            echo 'Date & Time: '.mdate($datestring, $gmt_to_local).$is_def_tz.br();
            echo form_open();
                echo form_label('Select Your Time-zone: ','tz-select').timezone_menu('','tz-select').br();
                echo form_label('Day-Light-Savings(DST): ','tz-dst').  form_checkbox($tz_select_options).br();
                echo form_submit('set_tz','Set Time Zone');
            echo form_close();
        ?>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tz-select").prepend("<option value='' selected='selected'>Select Your Time Zone</option>");
        });
    </script>
</html>
