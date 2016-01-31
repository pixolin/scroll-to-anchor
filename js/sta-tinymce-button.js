(function() {
  tinymce.PluginManager.add('sta_tc_button', function( editor, url ) {
    editor.addButton( 'sta_tc_button', {
      title: 'Anchor',
      icon:  'icon dashicons-admin-post',

      onclick:
        function() {
          editor.windowManager.open( {
                title: 'Insert anchor',
                body: [{
                  type: 'textbox',
                  name: 'name',
                  label: 'Anchor name'
                }],
                onsubmit: function( e ) {
                  editor.insertContent( '[anchor id="' + e.data.name + '"]');
                }
          } );
        }

    });
  });
})();
