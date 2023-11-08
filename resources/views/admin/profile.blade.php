@extends('layouts.admin')

@section('content')
  @php
    $user = auth()->user();
  @endphp
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">My Profile</h5>
      <form action="" method="post" class="d-flex">
        <div class="container" style="width: 70%;margin: 0;">
          <div class="row mb-3">
            <div class="col-10">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" value="{{ $user->email }}">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-10">
              <label class="form-label">Province</label>
              <select name="province_id" id="province_id" class="form-select">
                @foreach ($provinces as $province)
                  <option value="{{ $province->id }}" @selected($province->id == $user->city->province->id)>{{ $province->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-10">
              <label class="form-label">City</label>
              <select name="city_id" id="city_id" class="form-select">
                @foreach ($cities as $city)
                  <option value="{{ $city->id }}" @selected($city->id == $user->city->id)>{{ $city->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-10">
              <label for="exampleFormControlTextarea1" class="form-label">Address</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $user->address }}</textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <div class="d-flex flex-column">
          <h5>Your Avatar</h5>
          <img src="https://picsum.photos/400" alt="" width="150px">
          <p>edit (coming soon)</p>
        </div>
        
      </form>
    </div>
  </div>
@endsection
