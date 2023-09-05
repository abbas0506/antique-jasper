@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>{{ $category->name }}</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.categories.index')}}">Categories</a>
        <div>/</div>
        <div>{{$category->name}}</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif
    <div class="flex justify-between items-end mt-16">
        <label>{{$category->subcategories->count()}} sub-categories found</label>
        <a href="{{url('admin/subcategories/add', $category)}}" class="btn-teal">
            Add Sub-Category
        </a>
    </div>
    <div class="mt-4 p-8 border">
        @foreach($category->subcategories as $subcategory)
        <div class="flex items-center odd:bg-slate-100 py-2">
            <a href="{{route('admin.subcategories.show', $subcategory)}}" class="flex flex-1 link items-center">{{$subcategory->name}}</a>
            <!-- crud operation -->
            <div class="flex justify-center items-center space-x-4">
                <a href="{{route('admin.subcategories.edit', $subcategory)}}"><i class="bi bi-pencil-square"></i></a>
                <form action="{{route('admin.subcategories.destroy',$subcategory)}}" method="POST" id='del_sub_form{{$subcategory->id}}'>
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