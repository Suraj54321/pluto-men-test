@extends('layout.app')

@section('content')

    <h3>Category Edit</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{route('category.index')}}" class="btn btn-danger float-right">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('category.update',[$data->id])}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                <label>Category name</label>
                <input type="text" name="name" class="form-control"   placeholder="Enter category name" value="{{$data->name}}">
                </div>
                <button type="submit"  name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection