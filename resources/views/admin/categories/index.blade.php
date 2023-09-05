@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h4>Product Categories</h4>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Categories</div>
        <div>/</div>
        <div>All</div>
    </div>

    <!-- search -->
    <div class="flex relative w-full md:w-1/3 mt-12">
        <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
        <i class="bi-search absolute top-2 right-2"></i>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="overflow-x-auto w-full mt-8">
        <div class="flex justify-between items-end">
            <label for="">{{ $categories->count() }} records found</label>
            <a href="{{route('admin.categories.create')}}" class="btn-teal">
                Add New
            </a>
        </div>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="w-12">#</th>
                    <th class="text-left">Name</th>
                    <th class="w-20">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($categories as $category)
                <tr class="tr text-sm">
                    <td>{{$i++}}</td>
                    <td class="text-left">
                        <a href="{{route('admin.categories.show', $category)}}" class="link">{{$category->name}}</a>
                    </td>
                    <td class="text-xs">
                        <div class="flex justify-center items-center space-x-3">
                            <a href="{{route('admin.categories.edit', $category)}}">
                                <i class="bi-pencil-square"></i>
                            </a>
                            <form action="{{route('admin.categories.destroy',$category)}}" method="POST" id='del_form{{$category->id}}'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$category->id}}')">
                                    <i class="bi-x"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
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
                    $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection