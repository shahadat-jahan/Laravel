<div class="productRow row p-1">
    <?php
    $key = uniqid();
    $i=1;
    ?>
    <div class="col-1">
        <label></label>
        <p><strong class="serial">{{ ++$i }}</strong></p>
    </div>
    <div class="col-5">
        <label class="input-group">Product</label>
        <select class="products form-select" name="product[{{ $key }}][product_id]">
            <option value="">Select product</option>
            <?php
            //get product
            if ($products) {
                foreach ($products as $row) {
                    $productId = $row['id'];
                    $product = $row['name'];
                    // if (isset($selectedId) && $selectedId == $productId) {
                    //     echo '<option value="' . $productId . '" disabled>' . $product . '</option>';
                    // } else {
                    echo '<option value="' . $productId . '">' . $product . '</option>';
                    // }
                }
            }
            ?>
        </select>
    </div>
    <div class="col-3">
        <label class="input-group">Quantity</label>
        <input class="form-control" type="number" id="quantity" name="product[{{ $key }}][qty]" min="1"
            max="10">
    </div>
    <div class="col-3">
        <label>Remove row</label>
        <button type="button" data-id="" class="delRow btn btn-danger"><i class="fa fa-close"></i></button>
    </div>
</div>
