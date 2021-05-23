@extends('layout.app')

@section('content')

    <h3>Category Create</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{route('category.index')}}" class="btn btn-danger float-right">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('category.store')}}" >
                @method('POST')
                <div class="form-group">
                <label>Category name</label>
                <input type="text" name="name" class="form-control"   placeholder="Enter category name">
                </div>
                <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection