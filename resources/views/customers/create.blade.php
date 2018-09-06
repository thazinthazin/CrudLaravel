@extends('layouts.app')

@section('content')
    <div class="container">
          <h2>Create A Customer</h2><br/>
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
                    <lable>Level</lable>
                    <select name="place">
                      <option value="Yangon">Yangon</option>
                      <option value="Mandalay">Mandalay</option>
                      <option value="Bago">Bago</option>  
                    </select>
                </div>
            </div>
             <div class="row">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-left:38px">
                   <div class="hobby">
                      <label><input type="checkbox" value="drawing" name="option[]">Drawing</label>
                   </div>
                    <div class="hobby">
                       <label><input type="checkbox" value="cooking" name="option[]">Cooking</label>
                  </div>
                   <div class="hobby">
                      <label><input type="checkbox" value="travelling" name="option[]">Travelling</label>
                   </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <a class="btn btn-link" href="{{ url('/customer') }}">Cancel</a>
                <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
              </div>
            </div>
          </form>
        </div>
@endsection