<div class="row p-2">
    <div class="col">
	<label class="input-group">Product</label>
	<select class="select form-select" name="product_id">
	    <option value="">Select product</option>
	    <?php
	    //get product
	    if ($products) {
		$productId = '';
		foreach ($products as $row) {
		    $productId = $row['id'];
		    $product = $row['name'];
		    echo '<option value="' . $productId . '">' . $product . '</option>';
		}
	    }
	    ?>
	</select>
    </div>
    <div class="col">
	<label class="input-group">Quantity</label>
	<input class="form-control" type="number" id="quantity" name="qty" min="1"
	       max="10">
    </div>
    <div class="col-3">
	<label>Add row</label>
	<button type="button" data-id="" class="addRow btn btn-info"><i class="fa fa-add"></i></button>
	<button type="button" data-id="" class="delRow btn btn-danger"><i class="fa fa-close"></i></button>
    </div>
</div><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/productPurchases/newRow.blade.php ENDPATH**/ ?>