<?php
    $empty = 0;
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        if(empty($name)) {
            $empty = 1;
        } else {
            //Proceed with db-insert operation.
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
            Name        <input id="name" type="text" name="name" required="required" />
            Telephone   <input id="telephone" type="text" name="telephone" />
            Fax         <input id="fax" type="text" name="fax" />
            Web address <input id="webaddress" type="text" name="webaddress" />
            State       <input id="state" type="text" name="state" />
            Address     <input id="address" type="text" name="address" />
            <input type="submit" id="submit" name="submit" value="Submit" />
            </pre>
        </form>
    </body>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#submit").click(function() {
            var name = jQuery.trim($('#name').val());
            if(name == ''){
                $(".err").text('Name can\'t be left empty.');
                return false;
            }
            return false;
        });
    </script>
</html>