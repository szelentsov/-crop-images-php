$(function(){
    var progressBar = $('#progressbar');
    $(document).on('submit','#upload',function(event){
        event.preventDefault();
        $("#progressbar").toggle();
        $("#upload-bar").toggle();
        var $that = $(this),
            formData = new FormData($that.get(0));

        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            contentType: false,
            processData: false,
            data: formData,
            xhr: function(){
              var xhr = $.ajaxSettings.xhr(); 
              xhr.upload.addEventListener('progress', function(evt){
                if(evt.lengthComputable) { 
                  var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                  progressBar.val(percentComplete).text('Загружено ' + percentComplete + '%');
                }
              }, false);
              return xhr;
            },
            success: function(jqXHR){
               $("#progressbar").toggle();
               $('#message').prepend('<img id="theImg" src="uploadfiles/'+jqXHR+'" style="width:150px;height:150px" />');
               $('#message').prepend('<img src="обработка.gif" style="width:150px;height:150px;position:absolute" />');
               $.ajax({
                    url:'crop.php',
                    type:'POST',
                    data:{
                      img:  jqXHR
                    },
                    success: function(data){
                        console.log(data);
                    }
               });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });
});

