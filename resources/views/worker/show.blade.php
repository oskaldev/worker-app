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
      <a href="{{ route('workers.edit', $worker->id) }}">Изменить</a>
      <a href="{{ route('workers.index') }}">Назад</a>
      <div>
        <form action="{{ route('workers.destroy', $worker->id)  }}" method="post">
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