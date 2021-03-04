@extends('layout')

@section('content')
<html>
    <body>
            <h3>Show City Detail</h3>

    <div class="tile">
    <div class="tile-icon">
        <div class="example-tile-icon">
        <i class="icon icon-file centered"></i>
        </div>
    </div>
  <div class="tile-content">
    <p class="tile-title">{{$city->name}},{{$city->state}}</p>
    <p class="tile-subtitle">Population in 2010: {{$city->population_2010}} <br>
                            Ranked:{{$city->population_rank}} in {{$city->state}} </p>
  </div>
  <div class="tile-action">
    <button class="btn btn-secondary"><a href="{{route('cities.index')}}"> Back to All Cities</a></button>
  </div>
</div>
    </body>
</html>

@endsection