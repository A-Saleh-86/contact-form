<?php 


// Check For Request :

if($_SERVER['REQUEST_METHOD'] == "POST") {




    // Assign a Variables :

    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $mail = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    
    

    // Create Array Of Errors :

    $errors = array();
    

    if(strlen($user) < 3 ) {

        $errors[] = " - Username Must Be Greater Than 3 Characters";
        
    }
    
    
    if(! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE)) {
        $errors[]= " - Please Enter a Valid E-Mail";
    }

    if(strlen($msg) < 10) {

        $errors[] = " - Message Can't be Less Than 10 Characters";
    }

    // send mail :
    
            $myMail = 'mr.ahmedsaleh.86@gmail.com';
            $subject = 'Contact Form';
            $headers = 'From:' . $mail . '\r\n';

    if(empty($errors)) {

        mail($myMail,$subject,$msg,$headers);
        $user = '';
        $mail = '';
        $phone = '';
        $msg = '';
        $success = '<div class = "alert alert-success">We Have Recieved Your Mail</div>';

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@900&display=swap" rel="stylesheet">
    <title>Contact Form</title>
</head>
<body>

<!-- start form -->

<div class="container">
    <h2 class="text-center"> Contact Me</h2>
    <form class = "contact-form" action = "<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST" >
        <?php
        
        // Print Error Messages :
        
         if(!empty($errors)) { ?>
            <div class="alert alert-danger alert-dismissible " role="alert">
        <?php
            foreach($errors as $error) {
                echo $error . "<br>";
            }
        ?>
            </div>
        <?php }    ?>
        <?php if(isset($success)) { echo $success; } ?>

        <div class = "  form-group">
            
            <input 
                type="text" 
                class="username form-control"  
                name = "username" 
                placeholder = "Type your Username" 
                value = "<?php if(isset($user)){ echo $user; } ?>"
            >

            <i class = "fa fa-user fa-fw"></i>
            <span class = "asterisk">*</span>
            <div class = "alert alert-danger custom-alert-user">
                Username Must Be Greater Than <strong>3</strong> Characters
            </div>
        </div>
            
        <div class = "form-group">
            <input 
                type="email" 
                class="email form-control"  
                name = "email" 
                placeholder = "Please Type a Valid E-Mail"
                value = "<?php if(isset($mail)){ echo $mail; } ?>"
            >
            <i class="fa fa-envelope fa-fw"></i>
            <span class = "asterisk">*</span>
            <div class = "alert alert-danger custom-alert-email">
                E-Mail Can't Be <strong>Empty</strong> 
            </div>
        </div>

        <input 
            type="text" 
            class="form-control"  
            name = "phone" 
            placeholder = "Type your Phone-No"
            value = "<?php if(isset($phone)){ echo $phone; } ?>"
        >

        <i class="fa fa-phone fa-fw"></i>


        <textarea 
            class = "msg form-control" 
            name= "message" 
            placeholder = "Your Message !"
            ><?php if(isset($msg)){ echo $msg; } ?></textarea>

            <div class = "alert alert-danger custom-alert-msg">
                Message Can't be Less Than <strong>10</strong> Characters
            </div>
        <input 
            id = "submit-btn"
            class ="  btn btn-success  "  
            type="submit" 
            value="Send Message"
        >
        <i class="fa fa-paper-plane fa-fw send-icon"></i>
    </form>
    
</div>


<!-- end form -->


    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>