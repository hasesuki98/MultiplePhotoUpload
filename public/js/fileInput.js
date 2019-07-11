     $( document ).ready(function() {
     

       function checkExtension(data){
        switch (data.substring(data.lastIndexOf(".")+1)) {
          case "pdf":
          return "pdf";
          break;

          case "jpg":
          case "jpeg":
          case "png":
          return "image";
          break;

          case "webm":
          case "mkv":
          case "flv":
          case "vob":
          case "ogv":
          case "ogg":
          case "drc":
          case "gif":
          case "gifv":
          case "mng":
          case "avi":
          case "MTS":
          case "M2TS":
          case "mov":
          case "qt":
          case "wmv":
          return "movie";
          break;



          
          default:
          return "object";
          break;
        }

      } 

      var array=[];
      $("input[id='photos']")
      .map(function(index){
        array.push({
          caption: $(this).val() ,
          width: "35px",
          url: "imageDelete",
          key: index,
          extra:{
            _token:$('input[name="_token"]').val() ,
            data:$(this).val()
          },
          type:checkExtension($(this).val())
        });

      }).get();




        /*$('#image-file').on('filedeleted', function(event, key, jqXHR, data) {
            console.log('Key = ' + key);
          });*/
          $('#image-file').on('filecleared', function(event) {
            $(".file-preview-frame")
            .map(function(){return $(this).remove() }).get()
       $.get('/imageAllRemove',function(data){
        console.log(data)
       })
});

          $('#image-file').on('filesuccessremove', function(event, id) {
            $.get('/imageRemove/' + $('#'+id+' > .file-thumbnail-footer > .file-footer-caption').attr('title') , function(data) {
              console.log(data);
            });
          });

          $("#image-file").fileinput({
            theme: 'fa',
            uploadUrl: "imageUpload",
            uploadExtraData: function() {
              return {
                _token: $('input[name="_token"]').val(),
              };
            },
            /*allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],*/
            overwriteInitial: false,
            maxFileSize:22048,
            maxFilesNum: 10,
            initialPreview:$("input[id='photos']")
            .map(function(){return window.location.href.replace("pic","photo/"+ $(this).val() )}).get(),
            initialPreviewAsData: true,
            initialPreviewConfig: array,



          });
        });