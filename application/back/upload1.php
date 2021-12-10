<!DOCTYPE html>
<html>

<head>
    <title>Multiple Image upload</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2>File Upload</h2>
                </center>
                <form action="<?= base_url('file_upload/imageUploadPost'); ?>" enctype="multipart/form-data"
                    class="dropzone" id="image-upload" method="POST">
                    <div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
    </script>
</body>

</html>