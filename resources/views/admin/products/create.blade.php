@extends('layouts.admin')
@section('page-content')
<section class="m-8">
    <h1 class="page-title">Site Configuration</h1>
    <div class="bread-crumb">
        <a href="{{route('config.index')}}"> Config </a> >
        <a href="{{route('categories.index')}}">Categories </a> >
        {{$subcategory->category->name}} > <a href="{{route('subcategories.show',$subcategory)}}">Sub Category : {{$subcategory->name}} </a> > new product
    </div>

    <div class="container md:w-3/4 mx-auto px-5 mt-16">

        @if ($errors->any())
        <div class="alert-danger mt-8">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h1 class="font-bold text-red-600 mt-8"> Category : <span class="text-sm font-thin text-slate-600">[ {{$subcategory->name}} > {{$subcategory->category->name}} ]</span></h1>
        <form action="{{route('products.store')}}" method='post' class="flex flex-col w-full" onsubmit="return validate(event)">
            @csrf
            <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
            <label for="" class='mt-8'>Product Name</label>
            <input type="text" id='name' name='name' class="input" placeholder="Tea Cup">

            <label for="" class='mt-3'>Unit Price</label>
            <input type="number" id='unitprice' name='unitprice' class="input" placeholder="price">

            <div class="flex items-center justify-end mt-4 py-2">
                <button type="submit" class="btn-indigo-rounded">Save</button>
            </div>
        </form>
    </div>
</section>
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
</script>
@endsection