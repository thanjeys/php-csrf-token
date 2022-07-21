<?php
// (A) GENERATE CSRF TOKEN (RANDOM STRING INTO SESSION)
session_start();
$_SESSION["token"] = bin2hex(random_bytes(32));
$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs

// (B) EMBED TOKEN INTO FORM AS USUAL ?>
<form method="post" action="2-submit.php" onsubmit="return doAJAX()">
  <input type="hidden" id="token" value="<?=$_SESSION["token"]?>"/>
  <input type="email" id="email" value="jon@doe.com"/>
  <input type="submit" value="Go!"/>
</form>

<script>
function doAJAX () {
  // (C) GET FORM DATA + TOKEN
  var data = new FormData();
  data.append("token", document.getElementById("token").value);
  data.append("email", document.getElementById("email").value);
  // data.append(KEY, VALUE);

  // (D) AJAX FETCH
  fetch("2-submit.php", {
    method: "POST",
    body: data
  })
  .then((res) => { return res.text(); })
  .then((res) => { console.log(res); })
  return false;
}
</script>
