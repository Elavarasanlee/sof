<?php
    $empty = 0;
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        if(empty($name)) {
            $empty = 1;
        } else {
            //Proceed with db-insert operation.
            //To check if already an org. exists with same name, Do: "SELECT * FROM `tabl_name` WHERE `name`=$name;"
            echo 'You submitted following values:<br/>';
            foreach($_POST as $key=>$val) {
                echo $key.' = '.$val.'<br/>';
            }
        }
    }
?>
<html>
    <head>
        <title>Insert Details</title>
        <style type="text/css">
            .err{color: red;}
        </style>
    </head>
    <body>
        <span class="err">
        <?php if($empty==1): ?>
            Name can't be left empty.
        <?php endif; ?>
        </span>
        <form action="" method="post" name="myForm">
            <pre>
            Name        <input id="name" type="text" name="name" required="required" /><br/>
            Telephone   <input id="telephone" type="text" name="telephone" /><br/>
            Fax         <input id="fax" type="text" name="fax" /><br/>
            Web address <input id="webaddress" type="text" name="webaddress" /><br/>
            State       <input id="state" type="text" name="state" /><br/>
            Address     <input id="address" type="text" name="address" /><br/>
            <input type="submit" id="submit" name="submit" value="Submit" /><br/>
            </pre>
        </form><br/>
        <a href="update.php">Click Here</a> to update existing organization's details.
    </body>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#submit").click(function() {
            var name = jQuery.trim($('#name').val());
            if(name == ''){
                $(".err").text('Name can\'t be left empty.');
                return false;
            }
            return true;
        });
    </script>
</html>