@extends('layouts.app') 

@section('content')

<!-- Modal -->
<p>Test</p>
  <x-modal id="vertically-centered" title="Vertically centered" :centered="true">
    <x-slot name="body">
      <p>{{ Auth::user()->name }}</p>  
      <p>{{ Auth::user()->email }}</p>
      <p>Joined: {{ Auth::user()->created_at->format('F Y') }}</p>
      <p>Number of prayers recorded: {{ $userPrayerCount }}</p> 
    </x-slot>
    <x-slot name="footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </x-slot>
  </x-modal>
  @endsection