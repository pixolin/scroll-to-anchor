(function() {
  tinymce.PluginManager.requireLangPack('staButton', 'de');
  tinymce.PluginManager.add('staButton', function(editor, url) {
    editor.addButton('staButton', {
      title: 'Anchor',
      icon: 'icon sta-anchor-icon',

      onclick: function() {
          editor.windowManager.open({
            title: 'insert_anchor',
            body: [{
              type: 'textbox',
              name: 'name',
              label: 'anchor_name'
            }, {
              type: 'textbox',
              name: 'class',
              label: 'css_class'
            }],
            onsubmit: function(e) {
                var content = '[sta_anchor';
                // add some warning if field is empty
                content += ' id="' + e.data.name + '"';
                if (e.data.class) {
                  content += ' class="' + e.data.class + '"';
                }
                content += ']';
                editor.insertContent(content);
              } //onsubmit
          }); //editor.windowManager
        } //function

    }); //editor.addButton
  }); //tinymce.PluginManager
})();
