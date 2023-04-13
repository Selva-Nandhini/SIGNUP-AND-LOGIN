
<?php 

    require ('db_conn.php');
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendmail($email,$v_cod){
        
        require ('PHPMailer/src/PHPMailer.php');
        require ('PHPMailer/src/Exception.php');
        require ('PHPMailer/src/SMTP.php');

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = 'any1where01@gmail.com';
            $mail->Password   = 'ymjbitsksldaikwd';                    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
            $mail->Port       = 465;                           

            $mail->setFrom('any1where01@gmail.com', 'Anywhere');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Email verification from Anywhere';
            $mail->Body    = "Thanks for Registration.<br>Click the link bellow to verify your Email Address..
            <a href='http://localhost:8080/Phpfile/form/verify.php?email=$email&v_cod=$v_cod'>verify</a>";

            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }
    }

    if (isset($_POST['login'])) {
        
        $email =$_POST['email'];
        $password =$_POST['password'];

        $sql="SELECT * FROM users WHERE email = '$email' AND password = '$password' AND verification_status = '1'";
        $result = $conn->query($sql);
        
        if ($row = $result->fetch_assoc()) {
            $_SESSION['logged_in']=TRUE;
            $_SESSION['email']=$row['email'];
            header('location:datatble.php.php');

        }else{
                ?>
                <script>
                    Swal.fire(
                        'Please verify your email!!',
                        /* 'You clicked the button!', */
                        'warning'
                    </script>
                <?php

            /* echo "
                <script>
                    alert('please verify your email!!');
                    window.location.href='index.php'
                </script>"; */
        } 
    }

    if (isset($_POST['submit'])) {
        
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $email =$_POST['email'];
        $password =$_POST['password'];

        $user_exist_query="SELECT * FROM users WHERE fname= '$fname' AND email = '$email' ";
        $result = $conn->query($user_exist_query);

        if ($result) {
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                if ($row['fname'] === $fname && $row['email'] === $email) {
                     echo "
                        <script>
                            alert('firstname alredy taken!');
                            window.location.href='index.php'
                        </script>"; 
                }
                else {
                    echo "
                        <script>
                            alert('Email alredy register');
                            window.location.href='index.php'
                        </script>"; 
                }
            
            }else{
                
                $v_cod=bin2hex(random_bytes(16));
                
                $query ="INSERT INTO `users`(`fname`, `lname`, `email`, `password`,`verification_id`, `verification_status`) VALUES ('$fname','$lname','$email','$password','$v_cod','0')";
                    
                if (($conn->query($query)===TRUE) && sendmail($email,$v_cod )===TRUE) {
                    echo "
                     <script>
                     alert('Registration successfull!!.Check your mail to verify email.');
                        window.location.href='index.php'
                    </script>"; 
                }else{
                    echo "
                        <script>
                            alert('query can not run');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }else{
            echo "
            <script>
                alert('Query can not run');
                window.location.href='index.php'
            </script>";
        }
    }
 ?>
