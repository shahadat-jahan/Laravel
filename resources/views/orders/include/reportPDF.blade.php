<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportPDF</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            text-align: center;
        }

        @page {
            margin: 5px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            width: 100%;
            content: center;
            text-align: center;
        }

        th {
            font-weight: bold;
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    @if (Request::get('generate') == 'true')
        <div>
            <h2>@lang('label.ORDER_REPORT')</h2>
            <p>From: {{ Request::get('from_date') }}, To: {{ Request::get('to_date') }}</p>
        </div>
        <table border=1px; cellpadding=0; cellspacing=0;>
            <thead>
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
                            <td rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                {{ $order['order_no'] ?? '' }}</td>
                            <td rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                {{ $order['created_at'] ?? '' }}</td>
                            <td rowspan="{{ !empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1 }}">
                                {{ $order['customer'] ?? '' }}</td>
                            @if (!empty($order['purchase']))
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($order['purchase'] as $productId => $product)
                                    @if ($i > 0)
                        <tr>
                    @endif
                    <td>{{ $product['product'] ?? '' }}</td>
                    <td>{{ !empty($product['qty']) ? ($product['qty'] > 1 ? $product['qty'] . '/Boxes' : $product['qty'] . '/Box') : '0.00' }}
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
        <td colspan="8">No data found</td>
    </tr>
    @endif
    </tbody>
    </table>
    @endif
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
</body>

</html>
