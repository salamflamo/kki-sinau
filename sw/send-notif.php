<?php

require __DIR__ . '/vendor/autoload.php';
use Minishlink\WebPush\WebPush;

$auth = array(
    'VAPID' => array(
        'subject' => 'https://github.com/Minishlink/web-push-php-example/',
        'publicKey' => 'BCmti7ScwxxVAlB7WAyxoOXtV7J8vVCXwEDIFXjKvD-ma-yJx_eHJLdADyyzzTKRGb395bSAtxlh4wuDycO3Ih4',
        'privateKey' => 'HJweeF64L35gw5YLECa-K7hwp3LLfcKtpdRNK8C_fPQ', // in the real world, this would be in a secret file
    ),
);

$push = new WebPush($auth);
$message = "Ayo ayo dibeli Semuanya";
$s = $push->sendNotification($_POST['endpoint'],$message,$_POST['key'],$_POST['token'],true);
if ($s) {
  echo "berhasil";
  echo "<br><a href='/send.php'><< Kembali</a>";
} else {
  echo "masih ada kesalahan";
}
