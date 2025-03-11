@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>アイテム編集</h2>
                    <a class="btn btn-primary" href="{{ route('items.index') }}">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">名前:</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control" placeholder="名前を入力" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">説明:</label>
                            <textarea name="description" id="description" class="form-control" style="height:100px" placeholder="説明を入力" required>{{ $item->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection