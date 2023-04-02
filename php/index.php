<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <title>Sending email</title>
</head>
<body>
  <?php
    $to      = 'chris@kishun.io';
    $subject = "New Message From Your Website";
    $message = $_POST['message'];
    $headers = 'From: ' . $_POST['name'] . ' <myemail@email.com>' . "\r\n" .
        'Reply-To: myemail@email.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    header('Location: thank-you.html');
    exit();
  ?>
</body>
</html>