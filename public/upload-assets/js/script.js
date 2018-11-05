$(function(){

    var ul = $('#upload ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });
    var uploadUrl = $('#drop').find('[name="upload_url"]').val();
    var hapusGambarUrl = $('#drop').find('[name="hapus_gambar_url"]').val();
    // var aa = null;
    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({
        url : uploadUrl,
        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();
        },

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            // data.context.find('input').val(progress).change();

            // if(progress == 100){
            //     data.context.removeClass('working');
            // }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        },
        success : function(result,param2,jqxhr){
            var tpl = $('<li class="working"><input type="text" value="0" data-width="20" data-height="20"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span>x</span>'
                +'<input type="hidden" name="nama_gambar[]">'
                +'</li>');

            // Append the file name and file size
            tpl.find('p').text(result.name)
                         .append('<i>' + formatFileSize(result.size) + '</i>');

            // Add the HTML to the UL element
            tpl.appendTo(ul);

            // Initialize the knob plugin
            tpl.find('input[type="text"]').knob();

            tpl.find('input[type="hidden"]').val(result.name)

            // Listen for clicks on the cancel icon
            tpl.find('span').click(function(){

                tpl.fadeOut(function(){
                    var namaGambar = tpl.find('[type="hidden"]').val();
                    $.post({
                        data : {
                            gambar : namaGambar,
                            _token : $('#_csrf_token').attr('content')
                        },
                        url : hapusGambarUrl,
                        success : function(result){
                            // console.log(result)
                        }
                    })
                    tpl.remove();
                });
                // aa.remove();

            });
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

});