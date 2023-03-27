@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <h3>   <h3>Associate shcool</h3></h3>
                    <a href="{{ route('members.index') }}" class="btn btn-primary">Back</a>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                    <tr>
                        <th>School name</th>
                        <th>location</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($associateshcools as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->location }}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
