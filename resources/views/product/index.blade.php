@extends('layout.app')

@section('content')
    <h3>Product</h3>
    <div class="card mt-5">
        <div class="card-header">
            <a href="{{route('product.create')}}" class="btn btn-danger float-right">Create</a>
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
                    @foreach ($product as $prod)
                    <tr>
                        
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->name}}</td>
                        <td>@foreach($prod->category_id as $cat) <label>{{$cat->name}}</label> @endforeach</td>
                        <td>{{$prod->created_at->format('d-M-Y')}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('product.edit',[$prod->id])}}" class="btn btn-danger float-right">Update</a>
                                </div>
                                <div class="col-md-2">
                                    <form method="post" action="{{route('product.delete',[$prod->id])}}">
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