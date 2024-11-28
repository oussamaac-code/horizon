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




