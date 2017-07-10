var Simditor = require('simditor');
var editor = new Simditor({
    textarea: $('#content'),
    //optional options
    defaultImage: 'http://or1edgicq.bkt.clouddn.com/fate.png?imageView2/1/w/100/h/100',
    toolbar: [
		'title',
		'bold',
		'italic',
		'underline',
		'strikethrough',
		'fontScale',
		'color',
		'ol',
		'ul',
		'blockquote',
		'code',
		'link',
		'image',
		'indent',
		'outdent',
		'alignment'
	]
});
