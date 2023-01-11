@extends('user.main')

@section('title', 'List Campaign')

@section('content')

  <section class="search-form-wrapper pt-4 py-3 col-sm-10 col-md-8 col-lg-6 col-xl-5">
    <form class="d-flex" action="{{ route('user.campaigns.index') }}">
      <input name="q" type="text" class="form-control" id="q" value="{{ request('q') }}"
        placeholder="Search...">
      <button type="submit" class="ms-3 btn btn-blue">Search</button>
    </form>
  </section>

  <section class="campaings">
    <div class="row">
      {{-- Campaign Card --}}
      @foreach ($campaigns as $campaign)
        <x-campaign-card :$campaign />
      @endforeach
    </div>

    {{-- Paginate --}}
    {{ $campaigns->links() }}

  </section>

@endsection
