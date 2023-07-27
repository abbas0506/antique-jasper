@extends('layouts.admin')
@section('page-content')
<div class="container pt-32">
    <div class="page-title">
        <h3>Categories & Sub</h3>
        <div class="bread-crumb">
            List of all categories & their subcategories
        </div>
    </div>

    <div class="mt-16">
        <a href="{{route('categories.create')}}" class="btn-teal py-2 mt-2">
            New category
        </a>
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

    <div class="mt-8">
        @foreach($categories as $category)
        <div class="collapsible">
            <div class="head">
                <h3>
                    {{$category->name}}
                    <span class="text-xs ml-4 font-thin"></span>
                </h3>
                <i class="bi bi-chevron-down text-sm"></i>
            </div>
            <div class="body">
                <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                    <a href="{{route('subcategories.add',$category)}}" class="btn-blue text-center w-40">
                        <i class="bi bi-plus"></i>
                        Add Sub-Category
                    </a>
                    <!-- crud operation for categry-->

                    <a href="{{route('categories.edit', $category)}}" class="btn-teal text-sm"><i class="bi bi-pencil-square mr-2 text-slate-50"></i>Edit Category</a>
                    <form action="{{route('categories.destroy',$category)}}" method="POST" id='del_cat_form{{$category->id}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-red py-0 text-sm text-slate-50" onclick="delCategory('{{$category->id}}')">
                            <i class="bi bi-x mr-2 text-slate-50"></i>Delete Category
                        </button>
                    </form>


                </div>

                @foreach($category->subcategories as $subcategory)
                <div class="flex items-center odd:bg-slate-100 py-2">
                    <a href="{{route('subcategories.show', $subcategory)}}" class="flex flex-1 link items-center">{{$subcategory->name}}</a>
                    <!-- crud operation -->
                    <div class="flex justify-center items-center space-x-4">
                        <a href="{{route('subcategories.edit', $subcategory)}}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{route('subcategories.destroy',$subcategory)}}" method="POST" id='del_sub_form{{$subcategory->id}}'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center" onclick="delSubCategory('{{$subcategory->id}}')">
                                <i class="bi bi-x"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        @endforeach
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    function delCategory(formid) {

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
                $('#del_cat_form' + formid).submit();
            }
        });
    }

    function delSubCategory(formid) {

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
                $('#del_sub_form' + formid).submit();
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