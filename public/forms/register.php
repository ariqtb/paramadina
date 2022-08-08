<?php

  $receiving_email_address = 'register@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $register = new PHP_Email_Form;
  $register->ajax = true;
  
  $register->to = $receiving_email_address;
  $register->from_name = $_POST['name'];
  $register->from_email = $_POST['email'];
  $register->subject = $_POST['subject'];

  $register->add_message( $_POST['name'], 'From');
  $register->add_message( $_POST['email'], 'Email');
  $register->add_message( $_POST['message'], 'Message', 10);

  echo $register->send();
?>
