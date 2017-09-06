(function() {
	tinymce.PluginManager.add('staButton', function (editor) {
		editor.addButton('staButton', {
			title: 'Anchor',
			icon: 'icon sta-anchor-icon',

			onclick: function () {
					var editorselection = editor.selection.getContent();
					editor.windowManager.open({
						title: 'insert_anchor',
						body: [{
							type: 'textbox',
							name: 'name',
							label: 'anchor_name'
						}, {
							type: 'textbox',
							name: 'cssclass',
							label: 'css_class'
						}],
						onsubmit: function (e) {
								e.preventDefault();
								// alert if no anchor name provided
								if (e.data.name === '') {
									/*Validation failed, so let's tell the user about it.
									https://stackoverflow.com/questions/34783759/how-to-validate-tinymce-popup-textbox-value
									*/
									editor.windowManager.alert('Please provide an anchor name!');
								} else {
									editor.windowManager.close();

									// anchors may not contain spaces
									sanitizedname = sanitize(e.data.name);

									// collect output to insert shortcode
									var content = '[sta_anchor';
									// add some warning if field is empty
									content += ' id="' + sanitizedname + '"';
									// in case anchor contained spaces, we store that extra
									if( sanitizedname != e.data.name ) {
										content += ' unsan="' + e.data.name + '"';
									}
									if (e.data.cssclass) {
										content += ' class="' + e.data.cssclass + '"';
									}
									if( editorselection ) {
										content += ']' + editorselection + '[/sta_anchor]';
									} else {
										content += ' /]'
									}
									editor.insertContent(content);

									if( sanitizedname != e.data.name ) {
										editor.windowManager.alert("Link: #" + sanitizedname);
									}
								}
							} //onsubmit
					}); // editor.windowManager
				} // function

		}); // editor.addButton
	}); // tinymce.PluginManager
	function sanitize(value){
		value = value.toLowerCase();
		value = value.replace(/ä/g, 'ae');
		value = value.replace(/ö/g, 'oe');
		value = value.replace(/ü/g, 'ue');
		value = value.replace(/ß/g, 'ss');
		value = value.replace(/ /g, '-');
		value = value.replace(/\./g, '');
		value = value.replace(/,/g, '');
		value = value.replace(/\(/g, '');
		value = value.replace(/\)/g, '');
		return value;
	}
})();
