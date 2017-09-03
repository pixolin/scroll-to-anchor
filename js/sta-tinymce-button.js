(function() {
	tinymce.PluginManager.requireLangPack('staButton', 'de');
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
									editor.windowManager.alert('Please provide an anchor name!', function(){});
								} else {
									editor.windowManager.close();

									// anchors may not contain spaces
									sanitizedname = e.data.name.split(' ').join('-').toLowerCase();

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
										editor.windowManager.alert("Anchor-ID has been changed to #"+sanitizedname).focus;
									}
								}
							} //onsubmit
					}); // editor.windowManager
				} // function

		}); // editor.addButton
	}); // tinymce.PluginManager
})();
