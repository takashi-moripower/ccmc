<?php
header( 'Context-Type: text/plain');

echo "hello world";

$to1	    = 'takashi@moripower.jp';
$to2	    = 'nin65535@gmail.com';
$subject    = 'mail form test 08';
$message    = '本日は晴天なり';
$headers    = "From: ccc@ccmc.ac.jp";

$result = array();

$result[0] = wp_mail( $to1 , $subject , $message , $headers , '-t -fccc@ccmc.ac.jp');
$result[1] = wp_mail( $to2 , $subject , $message , $headers , '-t -fccc@ccmc.ac.jp');

print_r( $result );
//mb_send_mail( $to , $subject , $message , $headers , '-t -fccc@ccmc.ac.jp');
/*

mb_send_mail( $to1 , $subject , $message , $headers , '-t -fccc@ccmc.ac.jp');
mb_send_mail( $to2 , $subject , $message , $headers , '-t -fccc@ccmc.ac.jp');
 */
?>


