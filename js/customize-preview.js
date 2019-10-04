(function ( api, $ ) {
	'use strict';

	api.selectiveRefresh.partialConstructor.toc = api.selectiveRefresh.Partial.extend({

		/**
		 * Class name choices.
		 *
		 * This is populated in PHP via `wp_add_inline_script()`.
		 *
		 * @type {Array}
		 */
		choices: [],

		/**
		 * Refresh partial.
		 *
		 * Override refresh behavior to bypass partial refresh request in favor of direct DOM manipulation.
		 *
		 * @returns {jQuery.Promise} Resolved promise.
		 */
		refresh: function() {
			var partial = this, setting, body, deferred, className, tncFilter, toc;

			setting = api( partial.params.primarySetting );
			// className = setting.get();
			// body = $( document.body );
			// body.removeClass( partial.choices.join( ' ' ) );
			// body.addClass( className );

			tncFilter = $( '.tnc-filter' );
			toc = setting.get();
			if( toc != 'all')
				tncFilter.css('display', 'none');
			else
				tncFilter.css('display', 'block');

			if( toc == 'certificate' ) {
				$('#training').removeClass('active');
				$('#certificate').addClass('active');
			} else {
				$('#training').addClass('active');
				$('#certificate').removeClass('active');
			}

			// Do good diligence and return an expected value from the function.
			deferred = new $.Deferred();
			deferred.resolveWith( partial, _.map( partial.placements(), function() {
				return '';
			} ) );
			return deferred.promise();
		}
	});

}) ( wp.customize, jQuery );
