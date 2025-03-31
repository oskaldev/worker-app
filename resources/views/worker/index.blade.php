@extends('layout.main')
@section('content')
@can('create', \App\Models\Worker::class)
<div><a href="{{ route('workers.create') }}">Добавить</a></div>
@endcan

<hr>
<div>
  <form action="{{ route('workers.index') }}" method="get">
    <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
    <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
    <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
    <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
    <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
    <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">
    <input id="isMarried" type="checkbox" name="is_married" {{ request()->get('is_married') == 'on' ? 'checked' : '' }}>
    <label for="isMarried">is married</label>
    <input type="submit">
    <a href="{{ route('workers.index') }}">Сбросить</a>
  </form>
</div>
<hr>
<div>
  @foreach ($workers as $worker )
  <div>
    <div>Имя: {{ $worker->name }}</div>
    <div>Фамилия: {{ $worker->surname }}</div>
    <div>Почта: {{ $worker->email }}</div>
    <div>Брак: {{ $worker->is_married }}</div>
    <div>Возраст: {{ $worker->age }}</div>
    <div>Описание: {{ $worker->description }}</div>
    <div>
      <a href="{{ route('workers.show', $worker->id) }}">Просмотреть</a>
      @can('update', $worker)
      <a href="{{ route('workers.edit', $worker) }}">Изменить</a>
      @endcan
      @can('delete', $worker)
      <div>
        <form action="{{ route('workers.destroy', $worker->id)  }}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Удалить">
        </form>
      </div>
      @endcan
    </div>
  </div>
  <hr>
  @endforeach
  <div class="nav">{{ $workers->withQueryString()->links() }}</div>
</div>
@endsection