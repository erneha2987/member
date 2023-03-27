@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Edit School</h3>
                    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back to Schools</a>
                </div>

                <form action="{{ route('schools.update', $school->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $school->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" name="location" id="location" class="form-control" value="{{ $school->location }}">
                          @error('location')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                      </div>
      
                      <div class="form-group">
                          <label for="members">Members</label>
                          <select name="member_ids[]" id="members" class="form-control" multiple>
                              @foreach($members as $member)
                                  <option value="{{ $member->id }}"  <?php if (in_array($member->id, $school_member)){ echo"selected";  } ?> >{{ $member->name }}</option>
                              @endforeach
                          </select>
                          @error('member_ids')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                      </div>
                 <input type="hidden" name="schoolid" value="{{$school->id}}" />
                      <button type="submit" class="btn btn-primary">Update School</button>
                  </form>
              </div>
          </div>
      </div>
      @endsection

      
