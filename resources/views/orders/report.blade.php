@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center">
            <h2>@lang('label.ORDER_REPORT')</h2>
            {{-- <form class="form my-3" name="report" method="POST" action="{{ route('orders.showReport') }}"> --}}
            {!! Form::open(['route' => ['orders.showReport'], 'method' => 'POST', 'class' => 'form my-3']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-1">
                    <label>@lang('label.FROM')</label>
                </div>
                <div class="col-2">
                    {!! Form::date('from_date', Request::get('from_date'), ['class' => 'form-control']) !!}
                    <span>{{ $errors->first('from_date') }}</span>
                </div>
                <div class="col-1">
                    <label>@lang('label.TO')</label>
                </div>
                <div class="col-2">
                    {!! Form::date('to_date', Request::get('to_date'), ['class' => 'form-control']) !!}
                    <span>{{ $errors->first('to_date') }}</span>
                </div>
                {{-- get customer --}}
                <div class="col-2">
                    {!! Form::select('customer_id', $customers, Request::get('customer_id'), ['class' => 'form-select', 'placeholder' => __('label.SELECT_CUSTOMER')]) !!}
                </div>
                <div class="col-4 d-flex justify-content-end">
                    {!! Form::submit(__('label.REPORT'), ['class' => 'btn btn-outline-success ml-1', 'name' => 'search']) !!}
                    @if (Request::get('generate') == 'true' && !empty($data))
                        {{-- {!! form::link_to('URL::full() . &download=pdf', __('label.DOWNLOAD'), ['class' => 'btn btn-outline-success ml-1'], null) !!} --}}
                        <a href="{{ URL::full() . '&download=pdf' }}" class="btn btn-outline-success ml-1" type="button">
                            @lang('label.DOWNLOAD')
                        </a>
                        <a href="{{ URL::full() . '&view=print' }}" id="print" class="btn btn-outline-success  ml-1" type="button">
                            @lang('label.PRINT')
                        </a>
                        <a href="{{ URL::full() . '&export=exel' }}" class="btn btn-outline-success  ml-1" type="button">
                            @lang('label.EXPORT')
                        </a>
                    @endif
                </div>
            </div>
            {!! Form::close() !!}
            @if (Request::get('generate') == 'true')
                <div class="table-responsive ">
                    <table class="table align-middle table-bordered table-success text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>@lang('label.ORDER_NO')</th>
                                <th>@lang('label.DATE')</th>
                                <th>@lang('label.CUSTOMER')</th>
                                <th>@lang('label.PRODUCT')</th>
                                <th>@lang('label.QTY')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($data))
                                @foreach ($data as $orderId => $order)
                                    <tr>
                                        <td class="align-middle"
                                            rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                            {{ $order['order_no'] ?? '' }}</td>
                                        <td class="align-middle"
                                            rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                            {{ $order['created_at'] ?? '' }}</td>
                                        <td class="align-middle"
                                            rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                            {{ $order['customer'] ?? '' }}</td>
                                        @if (!empty($order['purchase']))
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($order['purchase'] as $productId => $product)
                                                @if ($i > 0)
                                    <tr>
                                @endif
                                <td class="align-middle">{{ $product['product'] ?? '' }}</td>
                                <td class="align-middle">
                                    {{ !empty($product['qty']) ? ($product['qty'] > 1 ? $product['qty'] . '/Boxes' : $product['qty'] . '/Box') : '0.00' }}
                                </td>
                                {{-- @if ($i == 0)
                                            <td class="align-middle" rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                                {{ $order['created_at'] ?? '' }}</td>
                                        @endif --}}

                                @if ($i < $rowspanArr[$orderId] - 1)
                                    </tr>
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
            @endif
            </tr>
            @endforeach
        @else
            <tr>
                <td class="align-middle" colspan="8">No data found</td>
            </tr>
            @endif

            </tbody>
            </table>
        </div>
        @endif
        <!--display the link of the pages in URL-->
    </div>
    </div>
@endsection
