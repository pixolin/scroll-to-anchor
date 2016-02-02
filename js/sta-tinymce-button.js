(function() {
  tinymce.PluginManager.add('sta_tc_button', function( editor, url ) {
    editor.addButton( 'sta_tc_button', {
      title: 'Anchor',
      icon:  'icon sta-anchor-icon',

      onclick:
        function() {
          editor.windowManager.open( {
                title: 'Insert anchor',
                body: [{
                  type: 'textbox',
                  name: 'name',
                  label: 'Anchor name'
                },{
                  type: 'textbox',
                  name: 'class',
                  label: 'CSS-Class (optional)'
                  }],
                onsubmit: function( e ) {
                  var content = '[sta_anchor ';
                  if(e.data.name) {
                    content += 'id="' + e.data.name + '" ';
                  }
                  if(e.data.class) {
                    content += 'class="' + e.data.class + '"';
                  }
                  content += ']';
                  editor.insertContent( content );
                } //onsubmit
          } );//editor.windowManager
        }//function

    });//editor.addButton
  });//tinymce.PluginManager
})();
