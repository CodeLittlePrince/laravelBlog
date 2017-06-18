<div class="_box card-aside">
  <form method="get" action="/">
    <input type="text" class="form-control" name="keywords" placeholder="输入关键词搜索...">
  </form>
</div>

<div class="_box card-aside">
	<h4>标签</h4>
	<hr>
	<div>
		@foreach ($tags as $tag)
			<span class="badge">{{ $tag->name }}</span>
		@endforeach
	</div>

</div>