( function( api ) {
	'use strict';

	// Add callback for when the header_textcolor setting exists.
	api( 'setg_tnc_visibility', function( setting ) {
		var istocOptionsDisplayed, linkSettingValueToControlActiveState;

		/**
		 * Determine whether the site title and tagline should be displayed.
		 *
		 * @returns {boolean} Is displayed?
		 */
		istocOptionsDisplayed = function() {
			return !(setting.get());
		};

		/**
		 * Update a control's active state according to the header_textcontrol setting's value.
		 *
		 * @param {wp.customize.Control} control Site Title or Tagline Control.
		 */
		linkSettingValueToControlActiveState = function( control ) {
			var setActiveState = function() {
				control.active.set( istocOptionsDisplayed() );
			};

			// FYI: With the following we can eliminate all of our PHP active_callback code.
			control.active.validate = istocOptionsDisplayed;

			// Set initial active state.
			setActiveState();

			/*
			 * Update activate state whenever the setting is changed.
			 * Even when the setting does have a refresh transport where the
			 * server-side active callback will manage the active state upon
			 * refresh, having this JS management of the active state will
			 * ensure that controls will have their visibility toggled
			 * immediately instead of waiting for the preview to load.
			 * This is especially important if the setting has a postMessage
			 * transport where changing the setting wouldn't normally cause
			 * the preview to refresh and thus the server-side active_callbacks
			 * would not get invoked.
			 */
			setting.bind( setActiveState );
		};

		// Call linkSettingValueToControlActiveState on the site title and tagline controls when they exist.
		api.control( 'toc_visibility', linkSettingValueToControlActiveState );
	} );

}( wp.customize ) );