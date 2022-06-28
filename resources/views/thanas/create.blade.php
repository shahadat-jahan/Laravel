@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add thana</h2>
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
                {!! Form::open(['route' => 'thanas.store', 'class' => 'shadow-lg p-5 bg-light m-5']) !!}
                {!! Form::token() !!}
                {!! Form::label('district_id', 'District', ['class' => 'input-group']) !!}
                {!! Form::select('district_id', $districts, null, ['placeholder' => 'Select district', 'class' => 'form-control']) !!}
                {!! Form::label('name', 'Thana', ['class' => 'input-group']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
