@extends('layouts.app') 

@section('content')

<!-- Modal -->
<!-- <p>Test</p>
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
-->


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



  @endsection