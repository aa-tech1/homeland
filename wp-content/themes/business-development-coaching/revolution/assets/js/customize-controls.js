( function( api ) {

	// Extends our custom "business-development-coaching" section.
	api.sectionConstructor['business-development-coaching'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );