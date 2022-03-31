<form action="{{ route($method,[$result->id] )}}" method="POST">
      @csrf
      @method('DELETE')
      {{$slot}}
</form>
