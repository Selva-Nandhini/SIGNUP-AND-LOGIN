<?php 
    require ('db_conn.php');

    if (isset($_GET['email']) && isset($_GET['v_cod'])) {
        
        $email = $_GET['email'];    
        $v_cod = $_GET['v_cod'];

        $sql="SELECT * FROM users WHERE email = '$email' AND verification_id = '$v_cod'";
        $result = $conn->query($sql);

        if ($result) {
            
            if ($result->num_rows == 1) {
                
                $row = $result->fetch_assoc();
                $fetch_Email = $row['email'];
                    
                if ($row['verification_status'] == 0) {
                    $update = "UPDATE users SET verification_status='1' WHERE email = '$fetch_Email'";
                    
                    if ($conn->query($update)===TRUE) {
                    echo "
                        <script>
                            alert('Verification Successfull');
                            window.location.href='datatable.php'
                        </script>"; 
                    }else{
                    echo "
                        <script>
                            alert('Query can not run');
                            window.location.href='index.php' 
                        </script>";
                    }
                }else{
                    echo "
                        <script>
                            alert('Email alredy Register');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }   
    }else{
        echo "
            <script>
                alert('server down!!');
                window.location.href='index.php'
            </script>";
    }
 ?>
