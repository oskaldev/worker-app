@extends('layout.main')
@section('content')
<hr>
<div>
  <form action="{{ route('workers.store') }}" method="post">
    @csrf
    <div style="margin: 10px;"><input type="text" name="name" placeholder="name" value="{{ old('name') }}">
      @error('name')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><input type="text" name="surname" placeholder="surname" value="{{ old('surname') }}">
      @error('surname')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><input type="email" name="email" placeholder="email" value="{{ old('email') }}">
      @error('email')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><input type="number" name="age" placeholder="age" value="{{ old('age') }}">
      @error('age')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><textarea name="description" placeholder="description">{{ old('description') }}</textarea>
      @error('desprition')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;">
      <label for="isMarried">Is married</label>
      <input {{ old('is_married') == 'on' ? 'checked' : '' }} id="isMarried" type="checkbox" name="is_married">
      @error('is_married')
      {{ $message }}
      @enderror
    </div>
    <div style="margin: 10px;"><input type="submit" value="Добавить"></div>
  </form>
</div>
</body>

</html>
@endsection