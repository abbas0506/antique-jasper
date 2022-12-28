@extends('layouts.admin')
@section('page-content')
<section class="m-8">
    <h1 class="page-title">Site Configuration</h1>
    <div class="bread-crumb">
        <a href="{{route('config.index')}}"> Config </a> >
        <a href="{{route('categories.index')}}">Categories </a> >
        Sub Category : {{$subcategory->name}}
    </div>
    <div class="container w-full md:w-4/5 mx-auto mt-16">
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

        <table class="table-auto w-full mt-8 border-separate border-spacing-5">
            <thead>
                <tr class="border border-slate-200">
                    <th class="text-center">Sub Category</th>
                    <th class="text-center">Products</th>
                </tr>
            </thead>
            <tbody>


                <tr class="tr border">
                    <td class="border text-center p-3">
                        <div>
                            <h1 class="font-bold">{{$subcategory->name}}</h1>
                            <p class="text-xs font-thin">[{{$subcategory->category->name}}]</p>

                        </div>

                        <div class="flex items-center justify-center space-x-2 mt-2">
                            <a href="{{route('subcategories.edit', $subcategory)}}" class="ml-3 text-green-300 hover:text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                            <form action="{{route('subcategories.destroy',$subcategory)}}" method="POST" id='del_form{{$subcategory->id}}' class="mt-1 flex justify-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center text-red-300 hover:text-red-800" onclick="delme('{{$subcategory->id}}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td class="p-3 border text-slate-600">
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            @foreach($subcategory->products as $product)
                            <a href="{{route('products.show',$product)}}" class="border text-center hover:bg-blue-200 hover:text-blue-800 transition-all duration-200 ease-in-out">{{$product->name}}</a>
                            @endforeach
                            <!-- add new subcategory button -->
                            <a href="{{route('products.add',$subcategory)}}" class="flex w-full border justify-center items-center border-dashed border-slate-300 hover:bg-teal-600 hover:text-slate-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </a>
                        </div>
                    <td>
                </tr>

            </tbody>
        </table>
    </div>
</section>

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