<?php

    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $message = $_REQUEST['message'];

    $title = "[WEBSITE] Message of: ".$name;

    $head = 'From: '.'info@anateixeira1108.com'."\r\n". 
            'Reply-To: '.$email." \r\n".
            'X-Mailer: PHP/'.phpversion();

    @mail('info@anateixeira1108.com',$title, $message, $head);

?>