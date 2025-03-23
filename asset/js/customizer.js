var api= wp.customize;

wp.customize.section( 'horizon_theme_blog_templates', function( section ) {
   
    section.expanded.bind( function( isExpanded ) {
        var url;
        if ( isExpanded ) {
          url = api.settings.url.home + '?page_id=' + page_urls.blog;
          api.previewer.previewUrl.set( url );
        }

    } );

} );

wp.customize.section( 'horizon_theme_destinations', function( section ) {
   
    section.expanded.bind( function( isExpanded ) {
        var url;
        if ( isExpanded ) {
          url = api.settings.url.home + '?page_id=' + page_urls.destinations;
          api.previewer.previewUrl.set( url );
        }

    } );

} );

wp.customize.section( 'horizon_theme_testimonials', function( section ) {
   
  section.expanded.bind( function( isExpanded ) {
      var url;
      if ( isExpanded ) {
        url = api.settings.url.home + '?post_type=testimonials=';
        api.previewer.previewUrl.set( url );
      }

  } );

} );

wp.customize.section( 'horizon_theme_gallery', function( section ) {
   
  section.expanded.bind( function( isExpanded ) {
      var url;
      if ( isExpanded ) {
        url = api.settings.url.home + '?post_type=galler=';
        api.previewer.previewUrl.set( url );
      }

  } );

} );




