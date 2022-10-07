( function( api ) {

	// Extends our custom "podcaster-radio" section.
	api.sectionConstructor['podcaster-radio'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );