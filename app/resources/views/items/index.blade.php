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
                                        <strong>name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="名前を入力" required>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <div class="form-group">
                                        <strong>description:</strong>
                                        <input type="text" name="description" class="form-control" placeholder="説明を入力" required>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success w-100">作成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <h3>アイテム一覧</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>名前</th>
                                <th>説明</th>
                                <th width="280px">アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                                </td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('items.show', $item->id) }}">詳細</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('items.edit', $item->id) }}">編集</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">削除</button>
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