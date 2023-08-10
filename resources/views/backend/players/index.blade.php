@extends('backend.layouts.master')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Players List</li>
                    </ol>
                  </nav>
            </div>
            <div class="col-sm-2">
                <a href="{{url('admin/players/create')}}" class="btn btn-primary">Create a Player</a>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <h2>Players</h2>
        <table id="playersTable" class="display table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Status</th>
                    <th>Team</th>
                    <th>League</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->number }}</td>
                        <td>{{ $player->status }}</td>
                        <td>{{ $player->team }}</td>
                        <td>{{ $player->league }}</td>
                        <td>
                            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
  <!-- Page level plugins -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
<script>

    $(document).ready(function() {
        $('#playersTable').DataTable();
    });
</script>

@endpush
