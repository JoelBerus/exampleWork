(function() {
	tinymce.PluginManager.add('sp_mce_button', function( editor, url ) {
		editor.addButton('sp_mce_button', {
			text: false,
            icon: false,
            image: url + '/mce-icon32.png',
            tooltip: 'WP Tabs',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Insert Shortcode',
					width: 400,
					height: 100,
					body: [
						{
							type: 'listbox',
							name: 'listboxName',
                            label: 'Select Shortcode',
							'values': editor.settings.spShortcodeList
						}
					],
					onsubmit: function( e ) {
						editor.insertContent( '[wptabs id="' + e.data.listboxName + '"]');
					}
				});
			}
		});
	});
})();