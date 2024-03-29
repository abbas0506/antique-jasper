@extends('layouts.guest')

@section('body')
<x-guest.marquee></x-guest.marquee>
<div class="container pt-32 min-h-[98vh]">
    <h3 class="mt-4 text-center tracking-widest">PAY NOW</h3>
    <div class="flex items-center justify-center space-x-2">
        <div class="text-center">Order #: </div>
        <a href="{{route('orders.show', $order)}}" class="tracking-wider link">{{ $order->tracking_id }}</a>
    </div>
    <div class="border-t flex flex-col justify-center items-center p-4 mt-4">
        <label>Total Amount</label>
        <h4>Rs. {{ $order->amount() }}</h4>
        <div class="text-xs mt-2">*Amount is recieved through JazzCash</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @endif
    <form action="{{route('orders.update', $order)}}" method="post" enctype="multipart/form-data" onsubmit="return validate(event)">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1 md:border border-slate-300 border-dotted p-4 md:divide-x">
            <div class="flex flex-col justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('images/payment/jazzcash.png')}}" alt="" class="24 w-24">
                    <h4 class="mt-4">03044933477</h4>
                    <label class="mt-2">*Please pay your charges through JazzCash and upload the receipt </label>
                    <label class="mt-1">Uploading image size should be less than 5MB</label>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('images/payment/no-image.png')}}" alt="" id='preview_img' class="w-40">
                    <!-- <button type="submit" class="btn-blue w-60 py-2 mt-4">Upload Image</button> -->
                </div>
                <div class="flex flex-col flex-1">
                    <label for="" class="mt-6">Receipt</label>
                    <input type="file" id='pic' name='receipt_image' placeholder="Image" class='py-2 w-48 md:w-64' onchange='preview_pic()' required>
                </div>

            </div>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-3 my-8">
            <a href="{{route('orders.paylater',$order)}}" class="btn-orange rounded-none w-32 text-center">Upload Later</a>
            <button class="btn-teal w-32 text-center">Upload Now</button>
        </div>
    </form>
</div>

@endsection
@section('script')
<script>
    function validate(event) {
        var name = $('#name').val()
        var validated = true;
        if (name == '') {
            validated = false
            Swal.fire({
                icon: 'warning',
                title: "Required input missing!",
                timer: 1500,
            });
        }
        return validated;
    }

    function preview_pic() {
        const [file] = pic.files
        if (file) {
            preview_img.src = URL.createObjectURL(file)
        }
    }

    // check only single color
</script>
@endsection