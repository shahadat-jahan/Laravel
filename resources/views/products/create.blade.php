@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add product</h2>
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
                <form class="shadow-lg p-5 bg-light m-5" method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.n')</label>
                            <input class="form-control" type="text" name="name" value="">
                            {{-- @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="col">
                            <label class="input-group">@lang('label.code')</label>
                            <input class="form-control" type="text" name="code" value="">
                        </div>
                    </div>
                    <br />
                    <label class="input-group">@lang('label.des')</label>
                    <textarea class="form-control" name="des" rows="5" cols="50" placeholder="Write product description..."></textarea>
                    <br />
                    <label class="input-group">@lang('label.status')</label>
                    <select class="form-select" name="status">
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    </select>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
