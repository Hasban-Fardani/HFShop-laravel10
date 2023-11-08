@extends('layouts.admin')

@section('content')
  <div class="p-2">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="">
      @csrf
      @method('PUT')
      <div>
        <label for="name" class="">Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $category->description }}" class="form-control">
        <button type="submit" class="btn btn-primary mt-3">Update</button>
      </div>
    </form>
  </div>
@endsection
