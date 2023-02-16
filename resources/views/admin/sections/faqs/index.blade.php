@extends('admin.main')

@section('title', 'Campaigns')

@section('content')
  <div class="pagetitle">
    <h1>Frequently Asked Question</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-3">

    <a href="{{ route('faqs.create') }}" class="btn btn-dark-blue col-12 col-sm-auto">
      <i class="bi bi-plus-square-dotted me-2"></i>
      <span>Buat</span>
      <span class="d-sm-none d-md-inline-block"> Pertanyaan</span>
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
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Jawaban</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($faqs) > 0)
                    @foreach ($faqs as $faq)
                      <tr>
                        <td>
                          <a href="{{ route('faqs.show', $faq->id) }}" class="d-flex align-items-center">
                            {{ $faq->question }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('faqs.show', $faq->id) }}" class="d-flex align-items-center">
                            {{ $faq->answer }}
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="text-center">Belum terdapat pertanyaan</td>
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
    {{ $faqs->links() }}

  </section>
@endsection
