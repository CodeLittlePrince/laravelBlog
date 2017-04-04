@extends('main')

@section('title', '| contact')

@section('content')
  <form>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="text" name="email" placeholder="input your email">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" class="form-control" type="text" name="name" placeholder="input your name">
    </div>
    <div class="form-group">
      <label for="tel">Tel</label>
      <input id="tel" class="form-control" type="text" name="tel" placeholder="input your tel">
    </div>
    <input class="btn btn-success" type="submit" value="submit">
  </form>
@endsection