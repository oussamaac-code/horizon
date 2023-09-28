


jQuery(document).ready(function($){

    // tab function

    $('#tabs button').click(function(e){
    
        e.preventDefault();
        $('#tabs li').removeClass('active');
        $(this).parent().addClass('active');
        var tab= $(this).attr('data-tab')
        console.log(tab)

        $('.tabs-container > div').removeClass('active');
        $('.tabs-container '+ tab).addClass('active');
    
    })

    // media uploader function

    var mediaUploader;

    $('#upload-button').click(function(e){
        
        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }

        var mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Upload Site Logo',
            button: {
                text: 'choose picture',
            },
            multiple: false,
        });
        

        mediaUploader.on('select', function(){
            attachment= mediaUploader.state().get('selection').first().toJSON()
            $('#site-logo-img').val(attachment.url);
            $('#logo-site-display').attr("src",attachment.url);
        })

        mediaUploader.open();


    })

    // video uploader

    $('#upload-button-video').click(function(e){
        
        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }

        var mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Upload background video',
            button: {
                text: 'choose video',
            },
            multiple: false,
        });
        

        mediaUploader.on('select', function(){
            attachment= mediaUploader.state().get('selection').first().toJSON()
            $('#coming-video').val(attachment.url);
            $('#coming_soon_bg').val( attachment.url);
        })

        mediaUploader.open();


    })

})
