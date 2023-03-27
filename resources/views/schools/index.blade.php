@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Schools</h3>
                    <a href="{{ route('schools.create') }}" class="btn btn-primary">Add New School</a>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                    
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->location }}</td>
                          
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('schools.destroy', $school->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this school?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection    