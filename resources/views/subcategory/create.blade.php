@extends('layout.app')

@section('content')

    <h3>Subcategory Create</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{route('subcategory.index')}}" class="btn btn-danger float-right">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('subcategory.store')}}" >
                @method('POST')
                @csrf
                <div class="form-group">
                <label>Subcategory name</label>
                <input type="text" name="name" class="form-control"   placeholder="Enter subcategory name">
                </div>
                <div class="form-group">
                    <label>Category</label>
                        <select name="parent_category_id" class="form-control">
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                         </select>
                </div>
                @if(!$subcategory->isEmpty())
                    <div class="form-group">
                        <label>Sub Category</label>
                            <select name="child_category_id" class="form-control" multiple>
                                @foreach ($subcategory as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                @endforeach
                            </select>
                    </div>
                @endif
                <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection