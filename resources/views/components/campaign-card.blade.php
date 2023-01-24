<div class="col-12">
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-4 col-sm-3 col-lg-2">
        <img class="img-fluid rounded-start img-responsive" src="{{ asset('storage/' . $campaign->image) }}"
          alt="{{ $campaign->title }}">
      </div>
      <div class="col-8 col-sm-9 col-lg-10">
        <div class="card-body p-2 h-100 d-flex flex-column justify-content-between">
          <div class="top">
            <div class="d-flex justify-content-between mb-3">
              <a href="{{ route('user.campaigns.show', $campaign->slug) }}"
                class="card-title p-0 m-0">{{ $campaign->title }}</a>
            </div>
            <div class="progress" style="height: 5px">
              <div class="progress-bar bg-blue" role="progressbar" aria-label="Example with label"
                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>
          </div>
          <div class="bottom">
            <div class="d-flex justify-content-between mt-auto">
              <div>
                <div class="text-muted small">Dana terkumpul</div>
                <div>{{ $campaign->donations_amount }}</div>
              </div>
              <div>
                <div class="text-muted small">Sisa hari</div>
                <div class="text-end">{{ $campaign->duration_in_days }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
