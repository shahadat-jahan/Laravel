@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Edit product</h2>
            <div class="input-group justify-content-center">
                <form class="shadow-lg p-5 bg-light m-5" method="POST" action="{{ route('products.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.n')</label>
                            <input class="form-control" type="text" name="name" value="{{ $product->name ?? '' }}">
                        </div>
                        <div class="col">
                            <label class="input-group">@lang('label.code')</label>
                            <input class="form-control" type="text" name="code" value="{{ $product->code ?? '' }}">
                        </div>
                    </div>
                    <br />
                    <textarea class="form-control" name="des" rows="5" cols="50" placeholder="Write your address...">{{ $product->des ?? '' }}</textarea>
                    <br />
                    <label class="input-group">@lang('label.status')</label>
                    <select class="form-select" name="status">
                        <option <?php
                        if (isset($product->status) && $product->status == '1') {
                            echo 'selected';
                        }
                        ?> value="1">Active</option>
                        <option <?php
                        if (isset($product->status) && $product->status == '0') {
                            echo 'selected';
                        }
                        ?> value="0">Inactive</option>
                    </select>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Update</button>
                    <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
