@extends('layouts.app')

@section('content')
    <div class="container">
          <div class="col-md">
            <h2>Create New Customer</h2><br/>
          </div>
           @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      
          <form method="post" action="{{route('customer_create')}}">
          {{csrf_field()}}
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                  <label for="date">Date of Birth:</label>
                  <input type="text" class="form-control" name="date">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-left:38px">
                     <lable>Male</lable>
                      <input type="radio" name="gender" value="male">
                     <lable>Female</lable>
                      <input type="radio" name="gender" value="female">
                </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-left:38px">
                    <lable>Place</lable>
                    <select name="place">
                       @foreach ($places as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                      @endforeach  
                    </select>
                </div>
            </div>
             <div class="row">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-left:38px">
                   @foreach ($hobbies as $hobby)
                   <div class="hobby">
                      <label><input type="checkbox" value="{{ $hobby }}" name="option[]">{{ $hobby }}</label>
                   </div>
                  @endforeach
                </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <a class="btn btn-primary" href="{{ url('/customer') }}">Cancel</a>
                <button type="submit" class="btn btn-success" style="margin-left:38px">Save</button>
              </div>
            </div>
          </form>
        </div>
@endsection