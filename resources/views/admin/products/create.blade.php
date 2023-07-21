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

        <h1 class="font-bold text-red-600 mt-8"> Category : <span class="text-sm font-thin text-slate-600">[ {{$subcategory->category->name}} > {{$subcategory->name}} ]</span></h1>


        <form action="{{route('products.store')}}" method='post' class="flex flex-col w-full" enctype="multipart/form-data" onsubmit="return validate(event)">
            @csrf
            <div class="flex w-full space-x-8 mt-8">
                <div class="flex flex-col flex-1">
                    <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                    <label for="" class=''>Product Name</label>
                    <input type="text" id='name' name='name' class="input" placeholder="Tea Cup">

                    <label for="" class='mt-3'>Unit Price</label>
                    <input type="number" id='unitprice' name='unitprice' class="input" placeholder="price">

                    <div class="flex items-center space-x-8 mt-3">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="w-4 h-4" id='chk_color' name="has_color" onchange="toggleColor()">
                            <label for="">Has Color</label>
                        </div>

                        <input type="color" id='color' name='color' class="input hidden" placeholder="color">

                    </div>

                    <label for="" class="mt-3">Image</label>
                    <input type="file" id='pic' name='image' placeholder="Image" class='py-2' onchange='preview_pic()' required>

                </div>
                <div class="flex justify-center items-center">
                    <img src="{{asset('images/no-image.png')}}" alt="" id='preview_img' class="w-60">
                </div>
            </div>
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

    function toggleColor() {
        if ($('#chk_color').prop('checked'))
            $('#color').show();
        else
            $('#color').hide();
    }

    function preview_pic() {
        const [file] = pic.files
        if (file) {
            preview_img.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection