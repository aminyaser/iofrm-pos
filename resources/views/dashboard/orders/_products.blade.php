<div id="print-area">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">@lang('site.name')</th>
            <th scope="col">@lang('site.quantity')</th>
            <th scope="col">@lang('site.price')</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ number_format($product->pivot->quantity * $product->sale_price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3>@lang('site.total') <span>{{ number_format($order->total_price, 2) }}</span></h3>

</div>

<button id="btn-prt" class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('site.print')</button>
