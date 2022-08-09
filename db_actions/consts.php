<?php
    $bool_true=1;
    
    $fail_msg = "Something worng, please try again";
    //Queries
    $update_activation = "UPDATE tbl_users SET isActive='$bool_true' WHERE mail='$mail' AND activation_key='$active'";
   

?>