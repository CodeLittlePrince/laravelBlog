<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ mix('js/app.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script src="https://cdn.staticfile.org/highlight.js/9.10.0/highlight.min.js"></script>
<script src="https://cdn.staticfile.org/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript">
	hljs.initHighlightingOnLoad();
	$(function() {
		$('#card-aside').scrollToFixed();
	});
</script>

@yield('scripts')