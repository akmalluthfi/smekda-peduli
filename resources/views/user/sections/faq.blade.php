@extends('user.main')

@section('title', 'Home')

@section('content')

  <section class="mb-5 pt-4">
    <h2 class="mb-3">Frequently Asked Question</h2>
    <p class="mb-4">Yang sering mereka tanyakan tentang smekda peduli</p>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pertanyaan Umum</h5>
        <div class="accordion accordion-flush" id="faq-group-2">
          @foreach ($faqs as $faq)
            <div class="accordion-item">
              <h2 class="accordion-header"> <button class="accordion-button collapsed"
                  data-bs-target="#faqsTwo-{{ $loop->iteration }}" type="button" data-bs-toggle="collapse">
                  {{ $faq->question }}</button></h2>
              <div id="faqsTwo-{{ $loop->iteration }}" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                <div class="accordion-body">{{ $faq->answer }}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

@endsection
