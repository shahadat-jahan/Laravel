@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add district</h2>
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
                {!! Form::open(['route' => 'districts.store', 'class' => 'shadow-lg p-5 bg-light m-5']) !!}
                {!! Form::token() !!}
                {!! Form::label('division_id', 'Division', ['class' => 'input-group']) !!}
                {!! Form::select('division_id', $divisions, null, ['placeholder' => 'Select division', 'class' => 'form-control']) !!}
                {!! Form::label('name', 'District', ['class' => 'input-group']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                <a class="btn btn-primary" href="{{ route('districts.index') }}">Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
