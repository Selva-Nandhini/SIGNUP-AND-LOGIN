<?php

require ('db_conn.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="navbar">
        <li class="logo"><img src="./assest/images.png" alt=""></li>
        <li class="men" >Anywhere app <span>.</span><li>
        <li class="menu">Home</li>
        <li class="menus">Join </li>
    </div>
    <div class="container">
        <h2>Welcome to Anywhere App.</h2>
        <!-- <h1>Welcome <span>.</span></h1> -->
        <h3> <span> Login </span> to Continue.</h3>
    </div>
    
    <div class="form-conrol">
        <form action="datatable.php" method="post">
            <div class='full-input-email'>
                <label for='name'>Email</label>
                <input type='email' name='email' class="text-box" required></input>
                <span class="fa-solid fa-square-envelope field-icon"  ></span> 
            </div><br>
            <div class='full-input-pass'>
                <label for='name'>Password</label>
                <input id="password"  type='password' name='password'  class="text-box" value="" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></input>
                <span id="togglePassword"  class="fa fa-fw fa-eye field-icon"></span>        
            </div>
            <div>
            <input type="submit" name="login" class="send-btn" value="Log In">
            </div>
        </form>
    </div>
    <script type="text/javascript">
       const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
    </script>
    </body>