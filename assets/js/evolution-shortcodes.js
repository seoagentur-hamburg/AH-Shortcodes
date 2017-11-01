jQuery(document).ready(function($) {

	$(".evolution-tabs").tabs();

	$(".evolution-toggle").each( function () {
		var $this = $(this);
		if( $this.attr('data-id') == 'closed' ) {
			$this.accordion({ header: '.evolution-toggle-title', collapsible: true, active: false  });
		} else {
			$this.accordion({ header: '.evolution-toggle-title', collapsible: true});
		}

		$this.on('accordionactivate', function( e, ui ) {
			$this.accordion('refresh');
		});

		$(window).on('resize', function() {
			$this.accordion('refresh');
		});
	});

});