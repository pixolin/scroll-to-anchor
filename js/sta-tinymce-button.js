(function() {
	tinymce.PluginManager.requireLangPack('staButton', 'de');
	tinymce.PluginManager.add('staButton', function (editor) {
		editor.addButton('staButton', {
			title: 'Anchor',
			icon: 'icon sta-anchor-icon',

			onclick: function () {
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
								var content = '[sta_anchor';
								// add some warning if field is empty
								content += ' id="' + e.data.name + '"';
								if (e.data.cssclass) {
									content += ' class="' + e.data.cssclass + '"';
								}
								content += ']';
								editor.insertContent(content);
							} //onsubmit
					}); // editor.windowManager
				} // function

		}); // editor.addButton
	}); // tinymce.PluginManager
})();
