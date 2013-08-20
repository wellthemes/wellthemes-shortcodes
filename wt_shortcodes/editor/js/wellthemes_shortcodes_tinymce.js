// closure to avoid namespace collision
(function () {
	// create the plugin
	tinymce.create("tinymce.plugins.wellthemesShortcodes", {	
		
		// creates control instances based on the control's id.
		// our button's id is "wellthemes_button"
		
		createControl: function ( btn, e ) {
			if ( btn == "wellthemes_button" ) {	
				
				var a = this;
				
				// creates the button
				var btn = e.createSplitButton('wellthemes_button', {
                    title: "Insert Shortcodes", // title of the button
					image: wellthemesShortCodes.plugin_folder +"/js/images/icon.png", // path to the button's image
					icons: false
                });
				
				//Render a DropDown Menu
                btn.onRenderMenu.add(function (c, b) {
                	
					c = b.addMenu({
						title: "Columns"
					});
					a.addImmediate( c, "One Half", "[column size='one-half' last='no'] Content goes here... [/column]<br /><br />");
					a.addImmediate( c, "One Third", "[column size='one-third' last='no'] Content goes here... [/column]<br /><br />");
					a.addImmediate( c, "One Fourth", "[column size='one-fourth' last='no'] Content goes here... [/column]<br /><br />");
					a.addImmediate( c, "One Fifth", "[column size='one-fifth' last='no'] Content goes here... [/column]<br /><br />");
					a.addImmediate( c, "One Sixth", "[column size='one-sixth' last='no'] Content goes here... [/column]<br /><br />");
					
					c = b.addMenu({
						title: "Message Boxes"
					});
					a.addImmediate( c, "Doc", "[box style='doc'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Download", "[box style='download'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Error", "[box style='error'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Help", "[box style='help'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Info", "[box style='info'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Media", "[box style='media'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "New", "[box style='new'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Note", "[box style='note'] Content goes here... [/box]<br /><br />");					
					a.addImmediate( c, "Success", "[box style='success'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Warning", "[box style='warning'] Content goes here... [/box]<br /><br />");
					
					c = b.addMenu({
						title: "Buttons"
					});
					a.addImmediate( c, "Default", "[button url='#' icon='ok' color='white' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Red", "[button url='#' icon='ok' color='red' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Blue", "[button url='#' icon='ok' color='blue' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Orange", "[button url='#' icon='ok' color='orange' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Black", "[button url='#' icon='ok' color='black' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Green", "[button url='#' icon='ok' color='green' size='medium' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Magenta", "[button url='#' icon='ok' color='magenta' size='medium' target='_blank'id=''] Button text... [/button]");
					
					c = b.addMenu({
						title: "Typography"
					});
					a.addImmediate( c, "Highlight", "[highlight color='yellow'] Content goes here... [/highlight]");
					a.addImmediate( c, "Spoiler", "[spoiler] Content goes here... [/spoiler]");
					a.addImmediate( c, "Dropcap", "[dropcap style='square']A[/dropcap]");
					
					c = b.addMenu({
						title: "Lists"
					});
					a.addImmediate( c, "caret-right", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=caret-right]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=caret-right]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "star", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=star]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=star]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "ok", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=ok]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=ok]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "remove", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=remove]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=remove]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "play-circle", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=play-circle]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=play-circle]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "tag", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=tag]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=tag]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "plus", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=plus]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=plus]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
								
					c = b.addMenu({
						title: "Social"
					});
					a.addImmediate( c, "Facebook", "[facebook]");
					a.addImmediate( c, "Goole+", "[gplus]");
					a.addImmediate( c, "Twitter", "[twitter]");
					a.addImmediate( c, "LinkedIn", "[linkedin]");
					a.addImmediate( c, "StumbleUpon", "[stumbleupon]");
					a.addImmediate( c, "Digg", "[digg]");
					

					c = b.addMenu({
						title: "Videos"
					});
					a.addImmediate( c, "Youtube", "[video type='youtube' id='Bag1gUxuU0g' width='500' height='300'  /]");
					a.addImmediate( c, "Vimeo", "[video type='vimeo' id='33716408' width='500' height='300' /]");
															
					a.addImmediate( b, "Lightbox Image", "[lightbox_image src='' bigimage='' title='Image']<br>" );

					c = b.addMenu({
						title: "Query"
					});

					a.addImmediate( c, "Recent Posts List", "[recent_posts title='Recent Posts' limit='5' order='ASC' category='0']");
					a.addImmediate( c, "Authors", "[print_authors display_posts=true exclude_admin=false show_fullname=true hide_empty=false]");
					
					c = b.addMenu({
						title: "Elements"
					});

					a.addImmediate( c, "Search Form", "[search button_text='Search']");
				});
                
                return btn;
			}
			
			return null;
		},		
		
		//Insert shortcode into content
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		
		// credits
		getInfo: function () {
			return {
				longname : "WellThemes Shortcodes",
				author : 'WellThemes',
				authorurl : 'http://wellthemes.com/',
				infourl : 'http://wellthemes.com/',
				version : "1.0"
			};
		}
	});
	
	// add wellthemes plugin
	tinymce.PluginManager.add("wellthemesShortcodes", tinymce.plugins.wellthemesShortcodes);
})();