<?php
/* Developed by Juno_okyo */
define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
define('HASHTAG_NAMESPACE', '#j2team_');

function request($url)
{
  if ( ! filter_var($url, FILTER_VALIDATE_URL)) {
    return FALSE;
  }
  
  $options = array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HEADER         => FALSE,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_ENCODING       => '',
    CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.87 Safari/537.36',
    CURLOPT_AUTOREFERER    => TRUE,
    CURLOPT_CONNECTTIMEOUT => 15,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_MAXREDIRS      => 5,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_SSL_VERIFYPEER => 0
  );

  $ch = curl_init();
  curl_setopt_array($ch, $options);
  $response = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  unset($options);
  return $http_code === 200 ? $response : FALSE;
}

if (isset($_POST)) {
  // Check hashtag
  if (isset($_POST['message']) && strpos(strtolower($_POST['message']), HASHTAG_NAMESPACE) === FALSE) {
    // Add comment
    $comment = 'Bổ sung #hashtag vào bài viết nhé, ' . $_POST['from__name'] . '!' . "\n\n" . 'https://community.j2.team/hashtags.html';
    request('https://graph.facebook.com/' . urlencode($_POST['id']) . '/comments?method=post&message=' . urlencode($comment) . '&access_token=' . ACCESS_TOKEN);
  }
}
