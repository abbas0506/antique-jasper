@extends('layouts.admin')
@section('page-content')
<div class="container pt-32">
    <h3>Categories & Sub</h3>
    <div class="bread-crumb">
        <a href="{{route('categories.index')}}">Categories </a>
        {{$subcategory->category->name}}::
        {{$subcategory->name}}
    </div>

    @if ($errors->any())
    <div class="alert-danger mt-8">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="flex alert-success items-center mt-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>

        {{session('success')}}
    </div>
    @endif

    <h3 class="mt-16"><span class="chevron-right"> {{$subcategory->category->name}} </span> {{$subcategory->name}} </h3>
    <div class="mt-4 p-6 border border-dashed">
        <div class="pb-4 border-b border-dashed">
            <a href="{{route('products.add',$subcategory)}}" class="btn-blue text-center w-40">
                <i class="bi bi-plus"></i>Add product
            </a>
        </div>

        @foreach($subcategory->products as $product)
        <div class="flex items-center odd:bg-slate-100 py-2">
            @if($product->image=='')
            <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-8 h-8">
            @else
            @php
            $url=asset('images/products')."/". $product->image;
            @endphp
            <img src="{{$url}}" alt="" id='preview_img' class="w-8 h-8 rounded-md">
            @endif
            <a href="{{route('products.show', $product)}}" class="flex flex-1 link items-center ml-4">{{$product->name}}</a>
            <!-- crud operation -->
            <div class="flex justify-center items-center space-x-4">
                <a href="{{route('products.edit', $product)}}"><i class="bi bi-pencil-square"></i></a>
                <form action="{{route('products.destroy',$product)}}" method="POST" id='del_form{{$product->id}}'>
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