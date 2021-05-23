@extends('layout.app')

@section('content')

    <h3>Product Create</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{route('product.index')}}" class="btn btn-danger float-right">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product.store')}}" >
                @method('POST')
                @csrf
                <div class="form-group">
                <label>Product name</label>
                <input type="text" name="name" class="form-control"   placeholder="Enter product name">
                </div>
                <div class="form-group">
                <label>Product price</label>
                <input type="number" name="price" class="form-control"   placeholder="Enter product pricce" min=0> 

                </div>
                <div class="form-group">
                    <label>Category</label>
                        <select name="category_id[]" class="form-control" multiple>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                         </select>
                </div>
                <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
