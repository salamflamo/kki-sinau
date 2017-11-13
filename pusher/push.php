<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'ap1',
    'encrypted' => true
  );
  $pusher = new Pusher\Pusher(
    '86222d5ffd3fb0c00018',
    '70dbd47c4889e2dca18d',
    '425549',
    $options
  );

  $data['name'] = 'Salam';
  $data['message'] = 'halo apa kabar?';
  $pusher->trigger('my-channel', 'my-event', $data);
?>
