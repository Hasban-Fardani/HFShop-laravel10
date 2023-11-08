@extends("layouts.admin")

@section("content")
  <form action="{{ route("admin.categories.store" )}}" method="post">
    @csrf
    <div>
      <label for="name"></label>
      <input type="text" name="name" id="name">
    </div>
  </form>
@endsection