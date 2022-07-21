<?php
// (A) START SESSION
session_start();

// (B) CHECK IF TOKEN IS SET
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
  exit("Token is not set!");
}

// (C) COUNTER CHECK SUBMITTED TOKEN AGAINST SESSION
if ($_SESSION["token"]==$_POST["token"]) {
  // (C1) EXPIRED
  if (time() >= $_SESSION["token-expire"]) {
    exit("Token expired. Please reload form.");
  }
  // (C2) OK - DO YOUR PROCESSING
  else {
    unset($_SESSION["token"]);
    unset($_SESSION["token-expire"]);
    echo "OK";
  }
}

// (C) INVALID TOKEN
else { exit("INVALID TOKEN"); }
