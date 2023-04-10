@if(isset($message))
<div class="alert alert-{{ $category ?? 'info'}}" role="alert">
  {{ $message }}
</div>
@endif