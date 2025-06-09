<?php
    require "phpHeaderFiles.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weCare | login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .login-card{
        text-align: center;
        padding-top: 10px;
        width: 60%;
        margin: auto;
        margin-top: 5rem;
        background-color: #D5CEA3;
        border-radius: 18px;
    }
    h3{
        text-align: center;
        color:#3C2A21;
        margin-bottom: 20px;
        font-size:21px;
    }
    h2{
            padding: 20px;
            color:#3C2A21
    }
    form{
       padding: 30px;
        text-align: center;
    }
    .email, .password{
        border:1px solid #1A120B;
        width:30%;
        height:30px;
        margin-bottom:20px ;
        border-radius: 5px;
        
    }
    .email, .password:focus{
          border:1px solid #1A120B;
        outline:none;
    }
    

    .btn-custom{
        width:10%;
        height:30px;
        color:white;
        border-radius: 4px;
        border: none;
        margin-top:20px;
        background-color: #3C2A21;


    }
    a{
        text-decoration: none;
    }
</style>
</head>
<body style="background-color:#E5E5CB;">
    
    <div class="login-card">
       
            <div class="col-md-12">
                <!-- to befixed -->
                <div class="col-lg-6 m-auto text-center"> <img src="pics/weCarelogo.png" class="round" width="140"> </div>
                <h3 class=" text-center  mb-4">Login to Account</h3>
                </div>
                <div  class="col-lg-12 text-center fs-3"  >
    <!-- success msg -->
 <div class="err" style="color:red"></div>
</div>
                <form method="POST" class="login-form">
                    
                    <!-- <input type="hidden" name="id"> -->
                    <div class="mb-3">
                        <input type="text" class="email" id="email" placeholder="Enter your email address" name="email" style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="password" id="password" placeholder="Enter password" name="password" style="font-size: 16px;">
                    </div>
             
                    <input type="submit" class="btn btn-custom w-50" value="Login">

                   
               
                
</form>
<p style="margin-top: 10px;">Or <h3> <a href="createAccount.php"><h2>Sign Up</h2></a></h></p>
            </div>
        </div>
    </div>
   


     <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="jQuery/jQuery.js"></script>

    <script>
        $(document).ready(function(){

            $(".login-form").submit(function(e){
                e.preventDefault();
                $(".btn").val('Loging...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'controls/userLogin.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                            window.location="user/checkOut.php"
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Login').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>


</body>
</html>