@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    @if($SportsSession->id > 0)
    Sports session #{{ $SportsSession->id }}
    @else
    New Sports session
    @endif
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      @if($SportsSession->id > 0)
      <form method="post" action="{{ route('sessions.update', $SportsSession->id ) }}">
      @else
      <form method="post" action="{{ route('sessions.store') }}">
      @endif
        @csrf
        @if($SportsSession->id > 0)
          @method('PATCH')
        @endif
        <div class="form-row">
          <div class="col-md-4">
            <div class="form-group">
                <label for="date_session">Date:</label>
                <input class="form-control" type="date" name="date_session" max="2050-12-31" min="2020-01-01" value="{{ $SportsSession->date_session }}" autofocus />
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
                <label for="duration_minutes">Duration:</label>
                <select class="custom-select" name="duration_minutes">
                  @for ($i = 15; $i <= 120; $i+= 15)
                    @if ($SportsSession->duration_minutes == $i)
                    <option selected value="{{ $i }}">{{ StringFormatingHelper::formatDuration($i) }}</option>
                    @else
                    <option value="{{ $i }}">{{ StringFormatingHelper::formatDuration($i) }}</option>
                    @endif
                  @endfor
                </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
                <label for="pull_ups">Pull ups:</label>
                <select class="custom-select" name="pull_ups">
                  @for ($i = 0; $i < 51; $i++)
                    @if ($SportsSession->pull_ups == $i)
                    <option selected value="{{ $i }}">{{ $i }}</option>
                    @else
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                  @endfor
                </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
                <label for="push_ups">Push-ups:</label>
                <select class="custom-select" name="push_ups">
                  @for ($i = 0; $i < 101; $i++)
                  @if ($SportsSession->push_ups == $i)
                  <option selected value="{{ $i }}">{{ $i }}</option>
                  @else
                  <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                  @endfor
                </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
                <label for="is_running">Running:</label>
                <select class="custom-select" name="is_running">
                    @if ($SportsSession->is_running)
                    <option value="0">No</option>
                    <option selected value="1">Yes</option>
                    @else
                    <option selected value="0">No</option>
                    <option value="1">Yes</option>
                    @endif
                </select>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea rows="5" columns="5" class="form-control" name="comment">{{ $SportsSession->comment }}</textarea>
        </div>

        <div class="row">

          <div class="col-md-2">

            <a href="{{ route('sessions.index') }}" class="btn btn-secondary">
              <i class="fa fa-arrow-left"></i> Back
            </a>

          </div>

          <div class="offset-md-8 col-md-2 text-right">
            @if($SportsSession->id > 0)
            <button type="submit" class="btn btn-primary">Update</button>
            @else
            <button type="submit" class="btn btn-primary">Validate <i class="fa fa-check"></i></button>
            @endif
          </div>

        </div>

      </form>
  </div>
</div>
@endsection
