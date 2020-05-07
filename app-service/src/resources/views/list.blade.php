@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Date</td>
          <td>Pull-ups</td>
          <td>Push-ups</td>
          <td>Running</td>
          <td>Duration</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($SportsSessions as $SportsSession)
        <tr>
            <td>
              <a href="{{ route('sessions.show', $SportsSession->id)}}">{{ $SportsSession->date_session }}</a>
            </td>
            <td>
              {{ $SportsSession->pull_ups }}
            </td>
            <td>
              {{ $SportsSession->push_ups }}
            </td>
            <td>
              {{ StringFormatingHelper::formatBool($SportsSession->is_running) }}
            </td>
            <td>
              {{ StringFormatingHelper::formatDuration($SportsSession->duration_minutes) }}
            </td>
            <td class="text-right">
              <form action="{{ route('sessions.edit', $SportsSession->id)}}" method="get">
                @csrf
                <button class="btn btn-primary" type="submit"><i class="fa fa-hammer"></i></button>
              </form>
            </td>
            <td class="text-left">
              <form action="{{ route('sessions.destroy', $SportsSession->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-alt"></i></button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div>
    <a href="{{ route('sessions.create') }}" class="btn btn-success">Add new session <i class="fa fa-rocket"></i></a>
</div>
@endsection
