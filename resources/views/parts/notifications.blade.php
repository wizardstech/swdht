<a class="navbar-item{{ is_null($notification->read_at)?' has-text-white has-background-primary':'' }}" href="{{ $notification->data['link'].'?read='.$notification->id }}">
  {{ $notification->data['message'] }}
</a>
