@extends('backend.layouts.master')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Players List</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <h2>Onboard a Player</h2>
       <div class="row justify-content-center">
        <div class="col-sm-5">
            <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Number:</label>
                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}">
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" role="switch" id="status" name="status" value="{{ old('status') }}">
                        <label class="form-check-label" for="status">Status</label>
                      </div>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team:</label>
                    <select class="form-select @error('team') is-invalid @enderror" aria-label="Select teams" id="team" name="team" value="{{ old('team') }}">
                        <option selected>Assign Team</option>
                        <option value="Arsenal">Arsenal</option>
                        <option value="Manchester United">Manchester United</option>
                        <option value="Manchester City">Manchester City</option>
                        <option value="Real Madrid">Real Madrid</option>
                      </select>

                    @error('team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="league" class="form-label">League:</label>
                    <input type="radio" class="btn-check @error('league') is-invalid @enderror" name="league" id="premier" value="premier" checked>
                    <label class="btn btn-outline-secondary" for="premier">Premier League</label>

                    <input type="radio" class="btn-check @error('league') is-invalid @enderror" name="league" id="champions__league" value="champions">
                    <label class="btn btn-outline-secondary" for="champions__league">Champions League</label>
                    @error('league')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
       </div>
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
