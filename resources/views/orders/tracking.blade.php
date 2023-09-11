@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">

    <h3 class="mt-4 text-center tracking-widest">Track Your Order</h3>
    <div>

        <label for="">Order #</label>
        <input type="text" id='tracking_id' class="custom-input" placeholder="- - - - - -">
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <table class="table-auto w-full mt-8">
        <thead>
            <tr>
                <th>Order #</th>
                <th class="w-96 text-left">Buyer Name</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@endsection
@section('script')
<script>
    $('#tracking_id').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {

            $.ajax({
                url: "{{url('orders/track')}}",
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    tracking_id: $(this).val(),
                },
                success: function(response) {
                    $('tbody').html(response.html);
                    // window.location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'warning',
                        title: errorThrown
                    });
                }
            });
        }
    });
</script>
@endsection