<?php
foreach($results as $key=>$val) {
    echo $val['id'].'-'.$val['value'].'<br/>';
}
        echo $this->pagination->create_links();
?>
