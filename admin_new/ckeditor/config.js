CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Templates,Cut,Undo,Find,Form,NewPage,Preview,Print,Copy,Paste,PasteText,PasteFromWord,Radio,TextField,Textarea,Select,Button,ImageButton,Redo,Replace,Blockquote,Indent,Outdent,NumberedList,BulletedList,RemoveFormat,CopyFormatting,JustifyLeft,JustifyCenter,JustifyBlock,JustifyRight,BidiRtl,Unlink,Anchor,Flash,Table,Image,Link,BidiLtr,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,Font,FontSize,Maximize,ShowBlocks,About,CreateDiv,Bold,Italic,Underline,Strike,Subscript,Superscript,Checkbox,SelectAll,HiddenField,Language,Save';
};