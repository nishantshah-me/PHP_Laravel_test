<x-layout title="Fans">
  <div class="centered-container">
    <h1 class="title">All Creators</h1>

    @foreach ($creators as $creator)
      <p>
        <a href="/top_fans/{{ $creator->id }}" class="fan-link">{{ $creator->name }}</a>
      </p>
    @endforeach
  </div>
</x-layout>