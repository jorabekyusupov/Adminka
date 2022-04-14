/*=========================================================================================
	File Name: editor-quill.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  var Font = Quill.import('formats/font');
  Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
  Quill.register(Font, true);

  // Bubble Editor

  var bubbleEditor = new Quill('#bubble-container .editor', {
    bounds: '#bubble-container .editor',
    modules: {
      'formula': true,
      'syntax': true
    },
    theme: 'bubble'
  });

  // Snow Editor

  var snowEditor = new Quill('#snow-container .editor', {
    bounds: '#snow-container .editor',
    modules: {
      'formula': true,
      'syntax': true,
      'toolbar': '#snow-container .quill-toolbar'
    },
    theme: 'snow'
  });

  // Full Editor



  var editors = [bubbleEditor, snowEditor, fullEditor];
    $(document).ready(function(){


        // $('.post-tabs a').on('show.bs.tab', function(){
        //     // alert('123');
        //     fullEditor.update();
        // });

    });
})(window, document, jQuery);

