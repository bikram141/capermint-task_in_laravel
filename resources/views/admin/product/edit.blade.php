@extends('admin.layout.app')

@section('content')

<div class="card m-5">
    <div class="card-header">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-table me-1"></i>{{$page}}</h6>
                <a href="{{ route('product-list') }}" class="btn btn-white mr-2"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Go Back</a>
              </div>
    </div>
    <div class="card-body">
        @include('admin.layout.alert_message')
        <form class="row g-3" action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="Product_title"><b>Product Title</b></label>
                    <input type="text" class="form-control" id="Product_title" name="Product_title" value="{{$product->Product_title}}"
                      placeholder="Product_title">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <img src="{{asset('Featured_image')}}/{{ $product->Featured_image }}" width="100" height="100">
                    <label for="file">Featured Image</label>
                     <input type="file" name="Featured_image" class="form-control" accept="image/*">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="form-label select-label">categories</label>
                    <select  class="form-control" id="Categories" name="Categories">
                      <option value=""selected>Choose..category</option>
                      @foreach(App\Models\Category::all() as $category)
                      <option  value="{{$category->id}}"  @if($category->id == $product->Categories) selected @endif>{{$category->Category_title}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
      
            <div class="col-md-3">
                <div class="form-group">
                    <label for="file">Gallery</label>
                    <?php foreach ((array)json_decode($product->Gallery) as $picture) { ?>
                        <img src="{{ asset('/Gallery/'.$picture) }}" style="height:30px; width:30px"/>
                       <?php } ?>
                     <input type="file" name="Gallery[]" class="form-control" multiple="multiple" accept="image/*">
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" placeholder="Product Description" name="Product_description" id="summernote">{{$product->Product_description}}</textarea>
                  </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="form-checks">
                    <label class="form-check-label" for="gridCheck">
                        Status
                      </label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Active" @if($product->Status == "Active") checked
                        @endif>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Inactive"  @if($product->Status == "Inactive") checked
                        @endif>
                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                      </div>
                    </div>
            </div>
        
            <div class="col-12">
              <button type="submit" class="btn btn-primary">update</button>
            </div>
          </form>
         
    </div>
</div>

@endsection