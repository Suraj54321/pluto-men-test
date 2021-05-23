@extends('layout.app')

@section('content')
    <h3>Category</h3>
    <div class="card mt-5">
        <div class="card-header">
            <a href="{{route('category.create')}}" class="btn btn-danger float-right">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr no.</th>
                        <th>name</th>
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at->format('d-M-Y')}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-danger float-right">Update</a>
                                </div>
                                <div class="col-md-2">
                                    <form method="post" action="{{route('category.delete',[$category->id])}}">
                                        @csrf
                                            <button 
                                                type="submit"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn  btn-primary">Remove</button>
                                            </form>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection