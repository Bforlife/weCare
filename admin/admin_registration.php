    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/adminNav.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Admin Registration</h4>
                </div>
 <div  class="col-lg-12 text-center fs-3 err" style="color:green;">
<!-- success msg -->
</div>
                <div class="card-body">
                    <form class="adminReg">
                        
                      
                        <div class="mb-3">
                            <label class="form-label" style=" color:#3C2A21;">Fullname</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style=" color:#3C2A21;">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style=" color:#3C2A21;">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <input type="submit" class="btn text-light w-100" style="background:#3C2A21;" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="../jQuery/jQuery.js"></script>

    <script>
        $(document).ready(function(){

            $(".adminReg").submit(function(e){
                e.preventDefault();
                $(".btn").val('Registering...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/adminReg.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    dataType: 'text', 
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                            
                          location = "admin_login.php";
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Register').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>



</body>
</html>
