@extends('admin.layout.app')

@section('content')

<div class="card m-5">
    <div class="card-header">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-table me-1"></i>{{$page}}</h6>
                <a href="{{ route('category-list') }}" class="btn btn-white mr-2"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Go Back</a>
              </div>
    </div>
    <div class="card-body">
        @include('admin.layout.alert_message')
        <form class="row g-3" action="{{route('category-store')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_title"><b>Category Title</b></label>
                    <input type="text" class="form-control" id="category_title" name="Category_title"
                      placeholder="category_title">
                  </div>
            </div>

            <div class="col-md-6 mt-5">
                <div class="form-checks">
                    <label class="form-check-label mx-3" for="gridCheck">
                       <b> Status </b>
                      </label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Active" checked>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Inactive">
                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                      </div>
                    </div>
            </div>
          
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
         
    </div>
</div>

@endsection