@extends('layout.app')

@section('content')
    <h3>Subcategory</h3>
    <div class="card mt-5">
        <div class="card-header">
            <a href="{{route('subcategory.create')}}" class="btn btn-danger float-right">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr no.</th>
                        <th>name</th>
                        <th>category</th>
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategory as $subcat)
                    <tr>
                        <td>{{$subcat->id}}</td>
                        <td>{{$subcat->name}}</td>
                        <td>{{$subcat->category->name}}</td>
                        <td>{{$subcat->created_at->format('d-M-Y')}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('subcategory.edit',[$subcat->id])}}" class="btn btn-danger float-right">Update</a>
                                </div>
                                <div class="col-md-2">
                                    <form method="post" action="{{route('subcategory.delete',[$subcat->id])}}">
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