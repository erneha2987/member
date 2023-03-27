@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Members</h3>
                    <a href="{{ route('members.create') }}" class="btn btn-primary">Add New Member</a>
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
                        <th>Email</th>
                        {{-- <th>Schools</th> --}}
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            {{-- <td>{{ $member->schools->pluck('name')->implode(', ') }}</td> --}}
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a> &nbsp;
                                    <a href="{{ route('members.associateshcool', $member->id) }}" class="btn btn-success">View associated schools</a>&nbsp;
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
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
