@extends('admin.main')

@section('title', 'Comment')

@section('content')
  <div class="pagetitle">
    <h1>Comments</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-3">

    <form method="get" action="{{ route('comments.index') }}" class="col-12 col-sm mb-3 mb-sm-0 me-sm-3"
      style="max-width: 28rem">
      <div class="input-group">
        <button class="btn  border color-primary bg-white dropdown-toggle shadow-none" type="button"
          data-bs-toggle="dropdown" aria-expanded="false"><span class="d-none d-sm-inline-block">Filters</span></button>
        <ul class="dropdown-menu p-3">
          <label for="s" class="form-label">Status</label>
          <select name="s" class="form-select shadow-none">
            <option selected value="all">All</option>
            <option value="open" @selected(request('s') === 'open')>Open</option>
            <option value="close" @selected(request('s') === 'close')>Close</option>
          </select>
        </ul>
        <input type="text" name="q" class="form-control shadow-none" placeholder="Search..."
          value="{{ request('q') }}">
        <button class="btn border color-primary bg-white shadow-none" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </form>

    <a href="{{ route('campaigns.create') }}" class="btn btn-dark-blue col-12 col-sm-auto">
      <i class="bi bi-plus-square-dotted me-2"></i>
      <span>Buat</span>
      <span class="d-sm-none d-md-inline-block"> Campaign</span>
    </a>
  </div> --}}

  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">

            <div class="table-responsive">
              <table class="table table-hover table-link">
                <thead>
                  <tr>
                    <th scope="col">Judul Campaign</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Body</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($donations) > 0)
                    @foreach ($donations as $donation)
                      <tr>
                        <td>
                          <a href="{{ route('comments.show', $donation->comment->id) }}"
                            class="d-flex align-items-center">
                            {{ $donation->campaign->title }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('comments.show', $donation->comment->id) }}"
                            class="d-flex align-items-center">
                            {{ $donation->user->name ?? $donation->name }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('comments.show', $donation->comment->id) }}"
                            class="d-flex align-items-center">
                            {{ $donation->comment->body }}
                          </a>
                        </td>
                        <td>
                          <div class="d-flex flex-nowrap py-3">
                            <form action="{{ route('comments.destroy', $donation->comment->id) }}" method="POST"
                              class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn badge text-bg-danger h-100"><i
                                  class="bi bi-trash align-text-bottom"></i></button>
                            </form>
                          </div>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="text-center">Komentar tidak ditemukan.</td>
                    </tr>
                  @endif

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>

    {{-- Paginate --}}
    {{ $donations->links() }}

  </section>
@endsection
