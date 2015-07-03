<script>
    $( document ).ready(function() {
        // Generate the slug URL and update the SEO title
        $('#slugUrl').slugify('#title', {
                slugFunc: function(str, originalFunc) {
                    var result = originalFunc(str);
                    $('#titleSeo').val(str);
                    return result;
                }
            });

        // Select a primary image
        $('#btnSearchPrimaryImage').click(function(){
            tinymce.activeEditor.windowManager.open({
                    file: media_manager.route,
                    title: 'Media manager',
                    width: 900,
                    height: 450,
                    resizable: 'yes',

                }, {
                window:     window,
                input_name: 'txtPrimaryImage',
                input_id:   'primaryImageID',
                showThumb: function(url){
                    $('#thumbContainer').removeClass('hide');
                    $('#thumbContainer').html('<img class="img-responsive" />');
                    $('#thumbContainer img').attr('src', url);

                }
            });
            return true;
        });


        $('.toggle-status').click(function(){
            $('#frmToggleStatus').submit();
        });
    });

</script>