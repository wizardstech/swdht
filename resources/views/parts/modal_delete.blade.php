<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{ $modal_title }}</p>
    </header>
    <section class="modal-card-body">
      <p> {{ $modal_message }}
    </section>
    <footer class="modal-card-foot">
    <form method="POST" action="{{ $delete_route }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
      <input type="submit" class="button is-danger" value="Delete" href="{{ $delete_route }}">
    </form>
      <button class="button modal-cancel">Cancel</button>
    </footer>
  </div>
</div>


