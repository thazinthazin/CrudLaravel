@extends('layouts.app')

@section('content')
    <div class="container">
        <br />
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
         @endif

        <a href="{{ route('customer_create') }}" class="btn btn-success pull-right">New Customer</a>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Place of Birth</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $customer)
          <tr>
            <td>{{$customer['id']}}</td>
            <td>{{$customer['name']}}</td>
            <td>{{$customer['date']}}</td>
            <td>{{$customer['place']}}</td>
            <td>{{$customer['gender']}}</td>
            <td>{{$customer['hobby']}}</td>

            <td><a href="{{url('/customer/edit/'. $customer['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('CustomerController@destroy', $customer['id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
@endsection