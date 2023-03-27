
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Edit Member</h3>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to Members</a>
                </div>

                <form action="{{ route('members.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $member->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $member->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   
                      <input type="hidden" name="memderid" value="{{ $member->id }}" />
                    <button type="submit" class="btn btn-primary">Update Member</button>
                </form>
            </div>
        </div>
    </div>
@endsection