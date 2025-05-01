( function( api ) {

	// Extends our custom "expert-business-advisor" section.
	api.sectionConstructor['expert-business-advisor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );