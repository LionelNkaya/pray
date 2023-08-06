
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profile Page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>{{ Auth::user()->name }}</p>  
            <p>{{ Auth::user()->email }}</p>
            <p>Joined: {{ Auth::user()->created_at->format('F Y') }}</p>
            <p>Number of prayers recorded: {{ $userPrayerCount }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="{{ route('home') }}">Close</a></button>
        </div>
      </div>
    </div>
  </div> 