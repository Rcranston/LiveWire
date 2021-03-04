@extends('layout')

@section('content')

            <h3>List of Cities</h3>
            <a class="btn btn-primary" href="{{route('cities.create')}}">Add City</a>
            <table class="table table-striped table-hover">
            
            <thead>
                <tr>
                <th><a href="{{route('cities.index','3')}}">Rank</a></th>
                <th><a href="{{route('cities.index','0')}}">City</a></th>
                <th><a href="{{route('cities.index','1')}}">State</a></th>
                <th><a href="{{route('cities.index','2')}}">Population</a></th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{$city->population_rank}}</td>
                <td>{{$city->name}}</td>
                <td>{{$city->state}}</td>
                <td>{{$city->population_2010}}</td>
                <td><a href="{{route('cities.show',$city->id)}}">More Info</a></td>
                <td><a href="{{route('cities.edit',$city->id)}}"><button class="btn btn-secondary" type="submit">Edit</button></a></td>
                <td><form action="{{route('cities.destroy',$city->id)}}" method="POST" onsubmit="return confirm('Are you sure you wish to remove?')">
                @csrf    
                @method('DELETE')
                <button class="btn btn-error" type="submit">Remove</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>    
@endsection