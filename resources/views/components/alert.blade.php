@props(["type" => "primary"])

<div class="alert alert-{{$type}}" role="alert">
  {{$slot}}
</div>