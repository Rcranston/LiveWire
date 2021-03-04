@extends('layout')
@section('content')
<div class="column col-3">

<h3>Add a City</h3>
    @if($errors->any())
    <div class="toast toast-error">
        @foreach($errors->all() as $error)
        <span>{{$error}}</span><br>
        @endforeach
    </div>
    @endif
    <form method="POST" action="{{route('cities.store')}}">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">City Name</label>
            <input class="form-input" type="text" id="name" placeholder="Ex. Seattle" name="name" value="{{old('name')}}">
            
            <label class="form-label" for="state">State Abrviation</label>
            <input class="form-input" type="text" id="State" placeholder="Ex. WA" name="state" value="{{old('state')}}">
            
            <label class="form-label" for="population_2010">Population</label>
            <input class="form-input" type="number" id="population_2010" placeholder="Ex. 100000" name="population_2010" value="{{old('population_2010')}}">

            <label class="form-label" for="population_rank">Rank witin the State</label>
            <input class="form-input" type="number" id="population_rank" placeholder="Ex. 1" name="population_rank" value="{{old('population_rank')}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-secondary"><a href="{{route('cities.index')}}"> Cancel</a></button>
        </div>    
    </form>
</div>
@endsection