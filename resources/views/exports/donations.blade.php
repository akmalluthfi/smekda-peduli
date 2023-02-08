<table border="1">
  <thead>
    <tr>
      <td>Nama Campaign : </td>
      <td>{{ $campaign->title }}</td>
    </tr>
    <tr>
      <td>Jumlah Donasi</td>
      <td>{{ $donations->count() }}</td>
    </tr>
    <tr>
      <td>Total Donasi</td>
      <td>{{ $campaign->donations_sum_amount }}</td>
    </tr>
  </thead>
</table>

<table>
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Jumlah Donasi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($donations as $donation)
      <tr>
        <td>{{ $donation->name ?? $donation->user->name }}</td>
        <td>{{ $donation->email ?? $donation->user->email }}</td>
        <td>{{ $donation->amount }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
