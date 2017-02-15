<!-- <!DOCTYPE html>
<html lang>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

</head>

<body>


    <div class="container content" style="padding: 0px;">





        <div class="header page-header">
    		<span>
    		<h1 id="head1">blue</h1><h1>IT<small style="color:#0093DD"> Entwicklung und Beratung</small></h1>
            </span>
           

        </div>




        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Portfolio</a>
                        </li>
                        <li>
                            <a href="#">Kontakt</a>
                        </li>
                        <li>
                            <a href="#">Mein Konto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

        <?php 
        include ('header.php');
         ?>

        <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid colcontent">
                    
                <div class="col-md-12">
                    <?php
                    if(isset($_POST['submitBtn']))
                    {
                        echo "<p>Test</p>";
                    }
                    ?>

                    <h1>Kontakt</h1>

                    <form method="post" action="http://localhost/medt/BlueIT/contact.php" >

                    <div class="form-group">
                        <label for="text">Vorname*</label>
                        <input type="name" class="form-control" name="vn" id="vn">
                    </div>

                    <div class="form-group">
                        <label for="text">Nachname*</label>
                        <input type="name" class="form-control" name="nn" id="nn">
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="em" id="em">
                    </div>


                    <h2>Anrede*</h2>
                    <label><input type="radio" name="anrede" value="cat1"> Frau</label><br>
                    <label><input type="radio" name="anrede" value="cat2"> Herr</label><br>
                    
                    <div class="form-group">
                        <label for="text" style="font-size: 30px;">Anfrage*</label>
                        <input  type="text" class="form-control" name="anfrage">
                    </div>

                    <button type="submit" class="btn btn-default" name="submitBtn" value="Anmelden">Anfrage senden</button>

                </form>
                </div>
                    
                </div>
            </div>
        </div>
        </div>


        

            
        




    </div>
    <?php
      
        if(isset($_POST['submitBtn']))
        {
            require '/vendor/autoload.php';

            //Create a new PHPMailer instance
            $mail = new PHPMailer;

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;

            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';//@TODO
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587; //@TODO

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls'; //@TODO

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "jell.stephan@gmail.com";//@TODO

            //Password to use for SMTP authentication
            $mail->Password = ""; //@TODO

            //Set who the message is to be sent from
            $mail->setFrom($_POST['em'],$_POST['em']);

            //Set an alternative reply-to address
            $mail->addReplyTo($_POST['em'], $_POST['vn']." ".$_POST['nn']);

            //Set who the message is to be sent to
            $mail->addAddress('jell.stephan@gmail.com', 'Stephan Jell');

            //Set the subject line
            $mail->Subject = 'PHPMailer GMail SMTP test';

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            
            $mail->Body    =$_POST['anfrage'];

            //Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';

            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        }

        ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
