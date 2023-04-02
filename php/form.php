<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $errors = [];
    $errorMessage = '';
    
    if (!empty($_POST)) {
       $name = $_POST['name'];
       $email = $_POST['email'];
       $message = $_POST['message'];
    
       if (empty($name)) {
           $errors[] = 'Name is empty';
       }
    
       if (empty($email)) {
           $errors[] = 'Email is empty';
       } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors[] = 'Email is invalid';
       }
    
       if (empty($message)) {
           $errors[] = 'Message is empty';
       }
    
       if (empty($errors)) {
           $toEmail = 'chris@kishun.io';
           $emailSubject = 'New email from your contact form';
           $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
           $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
           $body = join(PHP_EOL, $bodyParagraphs);
    
           if (mail($toEmail, $emailSubject, $body, $headers)) 
    
               header('Location: thank-you.html');
           } else {
               $errorMessage = 'Oops, something went wrong. Please try again later';
           }
    
       } else {
    
           $allErrors = join('<br/>', $errors);
           $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
       }
    ?>
</body>
</html>

