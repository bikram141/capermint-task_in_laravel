@extends('admin.layout.app')

@section('content')

<div class="card m-5">
    <div class="card-header">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-table me-1"></i>{{$page}}</h6>
                <a href="{{ route('product-create') }}" class="btn btn-dark btn-sm ">Add
                  product</a>
              </div>
    </div>
    <div class="card-body">
        @include('admin.layout.alert_message')
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Product_title</th>
                    <th>Product_slug</th>
                    <th>Categories</th>
                    <th>Featured_image</th>
                    <th>Gallery</th>
                    <th>Product_description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                 @foreach($product as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->Product_title}}</td>
                    <td>{{$item->Product_slug}}</td>
                    <td>
                        <?php foreach ((array)json_decode($item->category) as $i) { ?>
                            {{$i->Category_title}}
                           <?php } ?>
                    </td>
                    <td>
                        <img src="{{asset('Featured_image')}}/{{ $item->Featured_image }}" width="100" height="100">
                    </td>
                    <td>
                        <?php foreach ((array)json_decode($item->Gallery) as $picture) { ?>
                            <img src="{{ asset('/Gallery/'.$picture) }}" style="height:80px; width:80px"/>
                           <?php } ?>
                    </td>
                    <td>{{$item->Product_description}}</td>
                    <td>
                        @if($item->Status == "Active")
                        <span class="badge text-bg-primary">Active</span>
                        @else
                        <span class="badge text-bg-danger">Inactive</span>
                        @endif 
                    </td>
                    <td>
                        <form class="deleteForm float-left"
                        action="{{ route('product-delete',$item->id) }}" method="post">
                        <button class="btn btn-sm btn-danger ml-2" type="submit"
                            id="deleteButton">delete
                        </button>
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                    </form>
                    <a href="{{ route('product-edit', $item->id)}}"
                        class="btn btn-sm  ml-2 btn-primary">edit</a>
                    </td>
                   
                </tr>
                @endforeach
            
            </tbody> 
        </table>
    </div>
</div>

@endsection