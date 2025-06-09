<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body style="background-color:#D5CEA3;">
<div class="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="color:#3C2A21;">
                        <h2>Admin</h2>
                    </div>
                    <div class="card-body">
                    <div class="col-lg-6 m-auto text-center"> <img src="../pics/weCareLogo.png" alt="" width="80" style="border-radius: 50%;"> </div>
                <h3 class=" text-center mb-4" style="color:#3C2A21;">Login to Account</h3>
                <!-- success msg -->
                <div class="err"></div>

                        <form class="adminLogin">
                            <div class="mb-3">
                             
                                <label class="form-label" style=" color:#3C2A21;">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="color:#3C2A21;">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <input type="submit" class="btn text-light w-100"  style="background:#3C2A21;" value="Login">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
   
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../jQuery/jQuery.js"></script>

   <script>
        $(document).ready(function(){

            $(".adminLogin").submit(function(e){
                e.preventDefault();
                $(".btn").val('login...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/adminLogin.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    dataType: 'text', 
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                            
                          location = "index.php";
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
