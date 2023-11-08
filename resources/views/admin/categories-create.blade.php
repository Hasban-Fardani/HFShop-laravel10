@extends("layouts.admin")

@section("content")
<div class="p-2">
  <form action="{{ route("admin.categories.store" )}}" method="post">
    @csrf
    <div>
      <label for="name" class="">Name</label>
      <input type="text" name="name" id="name" class="form-control">

      <label for="description" class="form-label">Description</label>
      <input type="text" name="description" id="description" class="form-control">

      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
  </form>
</div>
@endsection