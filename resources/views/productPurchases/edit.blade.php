@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Edit order</h2>
            <div class="input-group justify-content-center">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="shadow-lg p-5 bg-light m-5" action="{{ route('productPurchases.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value={{ $order->id ?? '' }}>
                    <div class="row p-2">
                        <div class="col">
                            <label class="input-group">Order No.</label>
                            <input class="form-control" type="text" name="order_no" value={{ $order->order_no }}>
                        </div>
                        <div class="col">
                            <label class="input-group">Customer</label>
                            <select class="form-select" name="customer_id">
                                <?php
                                //get customer
                                if ($customers) {
                                    foreach ($customers as $row) {
                                        $customerId = $row['id'];
                                        $customer = $row['fname'] . ' ' . $row['lname'];
                                        if (isset($order->customer_id) && $order->customer_id === $customerId) {
                                            echo '<option value="' . $customerId . '" SELECTED>' . $customer . '</option>';
                                        } else {
                                            echo '<option value="' . $customerId . '">' . $customer . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                     $key = uniqid();
                     $i = 0;
                    foreach ($purchase as $item){
                        ?>
                    <div class="row p-2">
                        <div class="col">
                            <label class="input-group">Product</label>
                            <select class="select form-select" name="product[{{ $key }}][product_id]">
                                <option value="">Select product</option>
                                <?php
                                //get product
                                if ($products) {
                                    $productId = '';
                                    $product = '';
                                    foreach ($products as $row) {
                                        $productId = $row['id'];
                                        $product = $row['name'];
                                        if (isset($item['product_id']) && $item['product_id'] === $productId) {
                                            echo '<option value="' . $productId . '" SELECTED>' . $product . '</option>';
                                        } else {
                                            echo '<option value="' . $productId . '">' . $product . '</option>';
                                        }
                                    }
                                }
                                    ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="input-group">Quantity</label>
                            <input class="form-control" type="number" id="quantity"
                                name="product[{{ $key }}][qty]" min="1" max="10"
                                value={{ $item['qty'] }}>
                        </div>
                        <div class="col-3">
                            <label>Add row</label>
                            <?php 
                                        $i++;
                                        if($i<2){
                                    ?>
                            <button type="button" data-id="" class="addRow btn btn-info"><i
                                    class="fa fa-add"></i></button>
                            <?php
                                     }else{
                                        ?>
                            <button type="button" data-id="" class="delRow btn btn-danger"><i
                                    class="fa fa-close"></i></button>
                            <?php
                                     }
                                    ?>
                        </div>
                    </div>
                    <?php  } ?>
                    <div class="newRow">
                        {{-- Add new row here --}}
                    </div>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="{{ route('productPurchases.orderList') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
