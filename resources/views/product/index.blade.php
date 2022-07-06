@extends('layouts.app_master')

@section('content')

@php
    echo "This is product index page I display all data";
    $sn = 1;
@endphp

<a href="{{ route('product.create') }}">New Item</a>
<table>
    <thead>
        <th>#</th>
        <th>name</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($items as $item )
            
            <tr>
                <td>{{ $sn++ }}</td>
                <td>{{ ucfirst($item->firstname).' '.  ucfirst($item->lastname) }}</td>
                <td>
                    <a href="{{ route('product.show', $item->id) }}">View</a>
                    <a href="{{ route('product.update', $item->id, 'update') }}">Update</a> 
                    <button  type="buttun" class="delete-product" data-url="{{route('product.destroy',$item->id)}}" class="btn btn-danger btn-sm">Delete</button>
                   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h5>{{ $items->links() }}</h5>

@endsection

@section('embeded_script')
<script type="text/javascript">
$(document).ready(function() {

       $('.delete-product').on('click', function(){
        let url = $(this).data('url');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                deleteItem(url);
                console.log(value);
            }
        });
    });


    let deleteItem = function(url)
    {
        $.ajax({
            type: 'GET',
            url: url,
            data: url,
            success: function (response, textStatus, xhr) {
                if(response.data.url.length)
                {
                    window.location.replace(response.data.url);
                }

                console.log(response);
            }
        });
    }
});
</script>
@endsection