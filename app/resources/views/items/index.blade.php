@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel CRUD App</h2>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="名前を入力" required>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <input type="text" name="description" class="form-control" placeholder="説明を入力" required>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success w-100">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <h3>Items</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                <a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection