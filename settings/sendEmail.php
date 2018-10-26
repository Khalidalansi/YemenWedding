<?php
    $pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
    ?>

<div class="row">
    <?php 
    $to      = 'khalidalansi59@gmail.com';
$subject = 'Fake sendmail test';
$message = 'If we can read this, it means that our fake Sendmail setup works!';
$headers = 'From: sahilalansi@gmail.com' . "\r\n" .
    'Reply-To: sahilalansi@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    die('Failure: Email was not sent!');
}  
    ?>
</div>

<?php include 'inc/footer.php'; ?>