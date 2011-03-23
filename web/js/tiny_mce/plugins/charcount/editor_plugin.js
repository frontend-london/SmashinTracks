/**
 * $Id: editor_plugin_src.js 201 2009-09-14 15:56:56Z sfreeman $
 *
 * @author Scott Freeman The Scientist
 * @copyright Copyright © 2009, The Scientist, All rights reserved.
 */

(function() {
    tinymce.create('tinymce.plugins.CharCount', {
        block : 0,
        id : null,
        countre : null,
        cleanre : null,
        init : function(ed, url) {
            var t = this, last = 0;
            t.countre = ed.getParam('wordcount_countregex', /\S\s+/g);
            t.cleanre = ed.getParam('wordcount_cleanregex', /[0-9.(),;:!?%#$¿'"_+=\\/-]*/g);
            t.id = ed.id + '-char-count';

            ed.onPostRender.add(function(ed, cm) {
                var row, id;

                // Add it to the specified id or the theme advanced path
                id = ed.getParam('charcount_target_id');
                if (!id) {
                    row = tinymce.DOM.get(ed.id + '_path_row');

                    if (row)
                        tinymce.DOM.add(row.parentNode, 'div', {'style': 'float: right'}, ed.getLang('charcount.chars', 'Characters Remaining: ') + '<span id="' + t.id + '">' + charlimit + '</span>');
                } else
                    tinymce.DOM.add(id, 'span', {}, '<span id="' + t.id + '">' + charlimit + '</span>');
            });

            ed.onInit.add(function(ed) {
                ed.selection.onSetContent.add(function() {
                    t._count(ed);
                });

                t._count(ed);
            });

            ed.onSetContent.add(function(ed) {
                t._count(ed);
            });

            ed.onKeyUp.add(function(ed, e) {
                if (e.keyCode == last)
                    return;
                t._count(ed);
                last = e.keyCode;
            });
        },

        _count : function(ed) {
            var t = this, tc = 0;

            // Keep multiple calls from happening at the same time
            if (t.block)
                return;

            t.block = 1;

            setTimeout(function() {
                var tx = ed.getContent({format : 'raw'});
                var tx_len = 0;
                var originalText = ed.getContent({format : 'raw'});
                if (tx) {
                    tx_len = tx.length;
                    tx = tx.replace(/<.[^<>]*?>/g, ' ').replace(/ | /gi, ' '); // remove html tags and space chars
                    //tx = tx.replace(t.cleanre, ''); // remove numbers and punctuation
                    tc = charlimit-tx.length+1;
                    tx_len = tx_len - tx.length;

                } else {
                    tc = charlimit;
                }

                tinymce.DOM.setHTML(t.id, tc.toString());
                
                if(tc<0){
                    //alert(charlimit+' character limit reached!');
                    originalText = originalText.substring(0,charlimit+tx_len-3);
                    ed.setContent(originalText);
                    var originalText2 = ed.getContent({format : 'raw'});
                    originalText2 = originalText2.replace(/<.[^<>]*?>/g, ' ').replace(/ | /gi, ' '); // remove html tags and space chars
                    tc = charlimit-originalText2.length+1;
                    tinymce.DOM.setHTML(t.id, tc.toString());
                }
                setTimeout(function() {t.block = 0;}, 60);
            }, 1);
        },

        getInfo: function() {
            return {
                longname : 'Char Count plugin',
                author : 'Moxiecode Systems AB',
                authorurl : 'http://tinymce.moxiecode.com',
                infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/charcount',
                version : tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });

    tinymce.PluginManager.add('charcount', tinymce.plugins.CharCount);
})();