@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1>Investment Details</h1>
        <div>
            <p><strong>Name:</strong> {{ $investment->name }}</p>
            <p><strong>Amount:</strong> {{ $investment->amount }}</p>
            <p><strong>Category:</strong> {{ $investment->category }}</p>
            <p><strong>Investment Date:</strong> {{ $investment->investment_date }}</p>
        </div>
        <a href="{{ route('investments.index') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-warning">Edit</a>
        <div class="form-group row">
        
            <div class="col-sm-10">
            <form action="{{ route('investments.update-returns', $investment->id) }}" method="POST">
    @csrf
    <h2 style="margin-top:30px"  for="return_amount">Add New Returns:</h2>
    <input style="width:50%" type="number" class="form-control" name="return_amount" id="return_amount" required>
    <button style="margin-top:20px"  class="btn btn-danger btn-sm" type="submit">Update Returns</button>
</form>
  </div>
     </div>
    </div>






    

@endsection
