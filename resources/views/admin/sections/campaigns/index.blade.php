@extends('admin.main')

@section('title', 'Campaigns')

@section('content')
  <div class="pagetitle">
    <h1>Campaign</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-3">

    <form method="get" action="{{ route('campaigns.index') }}" class="col-12 col-sm mb-3 mb-sm-0 me-sm-3"
      style="max-width: 28rem">
      <div class="input-group">
        <button class="btn  border color-primary bg-white dropdown-toggle shadow-none" type="button"
          data-bs-toggle="dropdown" aria-expanded="false"><span class="d-none d-sm-inline-block">Filters</span></button>
        <ul class="dropdown-menu p-3">
          <label for="s" class="form-label">Status</label>
          <select name="s" class="form-select shadow-none">
            <option selected value="all">All</option>
            <option value="open" @selected(request('s') === 'open')>Open</option>
            <option value="completed" @selected(request('s') === 'completed')>Completed</option>
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
  </div>

  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">

            <div class="table-responsive">
              <table class="table table-hover table-link">
                <thead>
                  <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Dibutuhkan</th>
                    <th scope="col">Terkumpul</th>
                    <th scope="col">Waktu (hari)</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($campaigns) > 0)
                    @foreach ($campaigns as $campaign)
                      <tr>
                        <td>
                          <a href="{{ route('campaigns.edit', $campaign->slug) }}" class="d-flex align-items-center">
                            {{ $campaign->title }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('campaigns.edit', $campaign->slug) }}" class="d-flex align-items-center">
                            {{ $campaign->formatted_target_amount }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('campaigns.edit', $campaign->slug) }}" class="d-flex align-items-center">
                            {{ $campaign->donations_amount }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('campaigns.edit', $campaign->slug) }}"
                            class="d-flex align-items-center justify-content-center">
                            {{ $campaign->duration_in_days }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('campaigns.edit', $campaign->slug) }}" class="d-flex align-items-center">
                            @if ($campaign->status === 'open')
                              <span class="badge text-bg-primary">Open</span>
                            @else
                              <span class="badge text-bg-success">Closed</span>
                            @endif
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="text-center">Campaign tidak ditemukan.</td>
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
    {{ $campaigns->links() }}

  </section>
@endsection
