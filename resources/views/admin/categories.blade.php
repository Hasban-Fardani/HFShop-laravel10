@extends("layouts.admin")

@section('content')
  <div class="">

    <table id="datatablesProducts">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>

            <td>
              <div class="d-flex gap-2" style="width: 100px">
                <a href="{{ route("admin.categories.show", $category->id) }}" class="btn btn-primary">
                  @include('icons.view')
                </a>
                <a href="{{ route('admin.categories.edit', $category->id)}}" class="btn btn-warning">
                  @include('icons.edit')
                </a>
                <form action="{{ route("admin.categories.destroy", $category->id) }}" method="post" onsubmit="confirmDelete('{{$category->name}}')">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger">
                    @include('icons.delete')
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('custom_js')
  <script src="{{ asset('assets/sbadmin/js/datatables-products.js') }}"></script>
  <script>
    function confirmDelete(name) {
      let ans = confirm("are you sure to delete " + name + " ?")
      if (!ans) {
        event.preventDefault();
      }
    }
  </script>
@endsection