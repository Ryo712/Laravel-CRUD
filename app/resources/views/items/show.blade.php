@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>アイテム詳細</h2>
                    <a class="btn btn-primary" href="{{ route('items.index') }}">戻る</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>名前:</h5>
                        <p class="form-control">{{ $item->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>説明:</h5>
                        <p class="form-control" style="height: 100px">{{ $item->description }}</p>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-primary me-2" href="{{ route('items.edit', $item->id) }}">編集</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection