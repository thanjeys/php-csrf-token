<?php
// (A) GENERATE CSRF TOKEN (RANDOM STRING INTO SESSION)
session_start();

// (A1) FOR PHP 5
// CREDITS : https://www.thecodedeveloper.com/generate-random-alphanumeric-string-with-php/
// $length = 32;
// $_SESSION["token"] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

// (A2) FOR PHP 7+
// CREDITS : https://stackoverflow.com/questions/6287903/how-to-properly-add-csrf-token-using-php
$_SESSION["token"] = bin2hex(random_bytes(32));



// (A3) TOKEN EXPIRY
$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs

// (B) EMBED TOKEN INTO FORM ?>
<form method="post" action="2-submit.php">
  <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
  <input type="email" name="email" value="jon@doe.com"/>
  <input type="submit" value="Go!"/>
</form>
