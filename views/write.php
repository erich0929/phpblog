<?php if (! defined ('BASEPATH')) exit ('Direct access is not allowed!');
?>
<html>
<head>
    <meta charset='utf-8' />
    <link rel='stylesheet' href='/public/jquery-ui/jquery-ui.min.css' />
    <link rel='stylesheet' href='/public/bootstrap/css/bootstrap.min.css' />
	<title>Write a article.</title>
	<script src="/public/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var div = $(".upload-window");
            div.dialog ({autoOpen : false, modal : true, show : "blind", hide : "blind"});
            $(".upload-button").click(function () {
                div.dialog ('open');
                return false;
            });
            $ ('#uploadForm').submit (function (e) {
                e.preventDefault ();
                var formData = new FormData (this);
                
               // alert ($("input[name=filename]").val());
                $.ajax ({
                    url : '/index.php/upload',
                    type : 'post',
                    data : formData,
                    mimeType : 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success : function (data) {
                        div.dialog ('close');
                        window.prompt("Copy to clipboard: Ctrl+C, Enter", data);
                    },
                    error : function (req, status, err) { 
                        alert (status + ' : ' + err); 
                        div.dialog ('close');
                    }
                });
               return false;

           });
            $ ('.fileSubmit').click (function () {
                $ ('#uploadForm').submit ();
                //alert ($ ('#uploadForm').serialize() );
                
            });

        });
    </script>
</head>
<body>
    <?php include ('header.php'); ?>

    <div class='container'>
        <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Write your article.</h1>
          </div>
        </div>
      </div>
        <form action='insert.php' method='post'>
            <div class='form-group'>
                <div>
                    <label>Author</label>
                </div>
                <input type='text' name='name' value='erich0929' size='20' maxlength='10' />
            </div>
           
            <div class='form-group'>
                <div >
                    <label>Title</label>
                </div>
                <input type='text' name='title' size='50' maxlength='50' />
            </div>     
             <div class='form-group'>
                <label>File Upload</label>
                <span class="glyphicon glyphicon-circle-arrow-up upload-button" aria-hidden="true">
                </span>
            </div>
            <div class='form-group'>
                <label>Content</label>
                <textarea name="content" id="editor" rows="10" cols="65">
                    This is my textarea to be replaced with CKEditor.
                </textarea>
            </div>           
            <input type='submit' value='Post'/>
        </form>
        <div class='upload-window' title='File Upload'>
            <form id='uploadForm' enctype="multipart/form-data" action='#' method='post'>
                <div class='form-group'>
                    <label>File : </label>
                    <input type='file' name='filename' size='20' maxlength='10' />
                </div>
                <button type="button" class="btn btn-default fileSubmit">
                    <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
                </button>

            </form>
        </div>
    </div>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
    </script>
    
</body>
</html>