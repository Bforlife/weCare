<?php
require 'headerFiles.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Sales Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

  <div class="container">


    <div class="card shadow-lg rounded-4">
      <div class="card-body">
        <h2 class="card-title text-center mb-4">Update Sales Record</h2>
  
        <form  class="updateSales">
          <input type="hidden" name="order_id" id="order_id" value="<?php echo $sale['order_id']; ?>">

          <div class="mb-3">
            <label for="delivery_date" class="form-label">Delivery Date</label>
            <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="<?php echo $sale['delivery_date']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select name="payment_status" id="payment_status" value="<?php echo $sale['payment_status']?>" class="form-select" required>
              <option value="">Select</option>
              <option value="Paid">Paid</option>
              <option value="Unpaid">Unpaid</option>
              <option value="Pending">Pending</option>
            </select>
          </div>

          <div class="text-center pt-2">
            <a href="salesView.php" style="text-decoration: none; padding:20px; color:#3C2A21;">Back</a>
            <input type="submit" class="btn px-4 py-2" style="background-color:#3C2A21; color:white;" value="Update Record">
            <!-- <button type="submit" class="btn px-4 py-2" style="background-color:#3C2A21; color:white;"> -->
              <!-- Update Record
            </button> -->
          </div>
        </form>
        
      </div>
    </div>
  </div>


  <!-- jquery -->

<script src="../jQuery/jQuery.js"></script>

<script>
        $(document).ready(function(){

            $(".updateSales").submit(function(e){
                e.preventDefault();

                $(".btn").val('Updating...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'../controls/updateSales.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                          console.log(data)
                          // alert('Updated');
                            window.location="salesView.php";
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Update Sales').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>




</body>
</html>
