<div id="updateModal" class="fixed inset-0 z-50 bg-black bg-opacity-25 hidden flex items-center justify-center px-4">
  <div class="bg-white w-full max-w-3xl p-6 rounded-2xl shadow-2xl relative">
    
    <!-- Close Button -->
    <button class="close-modal absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">Update Sales Record</h2>

    <!-- Form -->
    <form action="../controls/updateSales.php" method="POST" class="space-y-4">
      <input type="hidden" name="order_id" id="order_id" value="<?php echo $sale['order_id']; ?>">

      <div>
        <label for="delivery_date" class="block text-sm font-medium text-gray-700 mb-1">Delivery Date</label>
        <input type="date" name="delivery_date" id="delivery_date" value="<?php echo $sale['delivery_date']; ?>" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
      </div>

      <div>
        <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
        <select name="payment_status" id="payment_status" value="<?php echo $sale['payment_status']; ?>" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
          <option value="">Select</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
                <option value="Pending">Pending</option>
        </select>
      </div>

      <div class="pt-2 text-center">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all shadow">
          Update Record
        </button>
      </div>
    </form>
  </div>
</div>

<!-- update btn and delete btn -->

   <div class="mt-4 text-right space-x-3">
      <button class="open-modal bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">Update</button>

      <form action="../controls/deleteSales.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this sale?');" class="inline-block">
        <input type="hidden" name="order_id" value="<?php echo $main_sale['order_id']; ?>">
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow">Delete</button>
      </form>
    </div>