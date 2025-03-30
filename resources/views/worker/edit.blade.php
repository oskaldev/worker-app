@extends('layout.main')
@section('content')
<hr>
<div>
  <form action="{{ route('workers.update', $worker->id) }}" method="post">
    @csrf
    @method('patch')
    <div style="margin: 10px;"><input type="text" name="name" placeholder="name" value="{{old('name') ?? $worker->name }}">
      @error('name')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><input type="text" name="surname" placeholder="surname" value="{{ $worker->surname }}"></div>
    <div style="margin: 10px;"><input type="email" name="email" placeholder="email" value="{{ $worker->email }}"></div>
    <div style="margin: 10px;"><input type="number" name="age" placeholder="age" value="{{ $worker->age }}"></div>
    <div style="margin: 10px;"><textarea name="description" placeholder="description">{{ $worker->description }}</textarea></div>
    <div style="margin: 10px;">
      <label for="isMarried">Is married</label>
      <input id="isMarried" type="checkbox" name="is_married"
        {{ $worker->is_married ? 'checked' : '' }}>
    </div>
    <div style="margin: 10px;"><input type="submit" value="Изменить"></div>
    <div> <a href="{{ route('workers.index') }}">Вернуться на главную страницу</a></div>
  </form>
</div>
@endsection