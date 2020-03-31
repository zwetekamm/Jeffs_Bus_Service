<?php
if(isset($_POST['contactFrmSubmit']) 
  && !empty($_POST['name']) 
  && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) 
  && !empty($_POST['event'])
  && !empty($_POST['message'])){
    
    // Submitted form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $message = $_POST['message'];
    
    // Send email to admin
    $to = '@email';
    $subject = 'Reservation Request';
    
    $htmlContent = '
    <h4>Reservation - Jeff\'s Bus Service</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Name:</th><td>'.$name.'</td>
        </tr>
        <tr>
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
            <th>Event:</th><td>'.$event.'</td>
        </tr>
        <tr>
            <th>Message:</th><td>'.$message.'</td>
        </tr>
    </table>';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Additional headers
    $headers .= 'From: Jeff\'s Bus Service <@email>' . "\r\n";
    
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    
    // Output status
    echo $status;die;
}

