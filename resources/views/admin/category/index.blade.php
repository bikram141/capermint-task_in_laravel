@extends('admin.layout.app')

@section('content')

<div class="card m-5">
    <div class="card-header">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-table me-1"></i>{{$page}}</h6>
                <a href="{{ route('category-create') }}" class="btn btn-dark btn-sm ">Add
                  category</a>
              </div>
    </div>
    <div class="card-body">
        @include('admin.layout.alert_message')
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Category_title</th>
                    <th>Category_slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                 @foreach($category as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->Category_title}}</td>
                    <td>{{$item->Category_slug}}</td>
                    <td>
                        @if($item->Status == "Active")
                        <span class="badge text-bg-primary">Active</span>
                        @else
                        <span class="badge text-bg-danger">Inactive</span>
                        @endif 
                    </td>
                    <td>
                        <form class="deleteForm float-left"
                        action="{{ route('category-delete',$item->id) }}" method="post">
                        <button class="btn btn-sm btn-danger ml-2" type="submit"
                            id="deleteButton">delete
                        </button>
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                    </form>
                    <a href="{{ route('category-edit', $item->id)}}"
                        class="btn btn-sm  ml-2 btn-primary">edit</a>
                    </td>
                   
                </tr>
                @endforeach
            
            </tbody> 
        </table>
    </div>
</div>

@endsection