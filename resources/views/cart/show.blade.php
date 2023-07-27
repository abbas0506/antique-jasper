@extends('layouts.guest')

@section('body')
<section class="h-screen bg-orange-50 bg-cover bg-no-repeat">
    <x-guest.marquee></x-guest.marquee>
    <div class="container pt-32 h-full">
        <h3>Cart Detail</h3>
        <div class="mt-16">

            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Qty</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0 ?>
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <?php
                    $total += $details['price'] * $details['qty'];
                    $url = asset('images/products') . "/" . $details['image'];
                    ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{$url}}" width="100" height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="qty">
                            <input type="number" value="{{ $details['qty'] }}" class="form-control qty" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['qty'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total {{ $total }}</strong></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection