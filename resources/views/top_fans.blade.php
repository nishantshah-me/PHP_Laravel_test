<x-layout title="Fans for All Creators">
<div class="centered-container">
  <h1 class="title">{{ $creator->name }}</h1>
  <h2 class="subtitle">Your biggest fans</h2>
  <table class="fan-table">
    <thead>
      <th>Rank</th>
      <th>Name</th>
    </thead>
    <tbody>
    @foreach ($fans as $index => $fan) 
      <tr>
        <td>{{ $index + 1}}</td>
        <td>{{$fan->display_name}} (views: {{$fan->view_count}})</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</x-layout>