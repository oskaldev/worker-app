@extends('layout.main')
@section('content')
<div>
  <div>
    <div>Имя: {{ $worker->name }}</div>
    <div>Фамилия: {{ $worker->surname }}</div>
    <div>Почта: {{ $worker->email }}</div>
    <div>Брак: {{ $worker->is_married }}</div>
    <div>Возраст: {{ $worker->age }}</div>
    <div>Описание: {{ $worker->description }}</div>
    <div>
      <a href="{{ route('worker.edit', $worker->id) }}">Изменить</a>
      <a href="{{ route('worker.index') }}">Назад</a>
      <div>
        <form action="{{ route('worker.delete', $worker->id)  }}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Удалить">
        </form>
      </div>
    </div>
  </div>
  <hr>
</div>
</body>

</html>
@endsection