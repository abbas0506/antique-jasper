@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h4>{{ $subcategory->name }}</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.show', $subcategory->category)}}">{{$subcategory->category->name}}</a>
        <div>/</div>
        <div>{{$subcategory->name}}</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="flex flex-wrap justify-between items-center mt-16">
        <div>{{$subcategory->products->count()}} products found</div>
        <a href="{{url('admin/products/add', $subcategory)}}" class="btn-teal">
            Add Product
        </a>
    </div>
    <div class="mt-4 p-6 border border-dashed">
        @foreach($subcategory->products as $product)
        <div class="flex items-center odd:bg-slate-100 py-2">
            @if($product->image=='')
            <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-8 h-8">
            @else
            @php
            $url=asset('images/products')."/". $product->image;
            @endphp
            <img src="{{$url}}" alt="img" id='preview_img' class="w-12 h-12 rounded-md">
            @endif
            <a href="{{route('admin.products.show', $product)}}" class="w-24 ml-4 link">AJ#{{$product->code}}</a>
            <div class="flex flex-1 ml-4">{{$product->name}}</div>
            <!-- crud operation -->
            <div class="w-24">{{$product->price}}</div>
            <div class="flex justify-center items-center space-x-4">
                <a href="{{route('admin.products.edit', $product)}}"><i class="bi bi-pencil-square"></i></a>
                <form action="{{route('admin.products.destroy',$product)}}" method="POST" id='del_form{{$product->id}}'>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center" onclick="delme('{{$product->id}}')">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    function delme(formid) {

        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                //submit corresponding form
                $('#del_form' + formid).submit();
            }
        });
    }

    function search(event) {
        var searchtext = event.target.value.toLowerCase();
        var str = 0;
        $('.tr').each(function() {
            if (!(
                    $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection