<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.1.4/css/froala_editor.pkgd.min.css" integrity="sha512-rHIbnxI7bJkaFuIU4ypQUzEdwrdSh3VP8aNImoPlFek1adiUJ3jBXUACas2zrqyS0G3FAqVS2qlF+zRWBRrOBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .fr-box.fr-basic .fr-element {
               min-height: 500px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6 class="text-white">{{ __('Froala image upload') }}</h6>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.1.4/js/froala_editor.pkgd.min.js" integrity="sha512-tlI1dnxW+rDI4P1G3fQbVKLNCUdfovipktWMZZGeu5LeCuK+3Y4BPKYny8YT82SBsLKF7FNy/uS0j2bYmm6Hbg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.1.4/js/languages/zh_tw.min.js" integrity="sha512-jGhvRBJ2uepK1idfbWV+3fOSmyvfTLBcTwJP7TrBAvprEQv8v3AztnKwqnRkf/FuDbDGbKPxI4ASZYt/BONI3A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script type="module">
            new FroalaEditor('#editor', {
                // Allow to upload PNG and JPG.
                imageAllowedTypes: ['jpeg', 'jpg', 'png'],
                // Set max image size to 5MB.
                imageMaxSize: 5 * 1024 * 1024,
                // Set request type.
                imageUploadMethod: 'POST',
                imageUploadParams: {_token: '{{ csrf_token() }}'},
                // Set the image upload URL.
                imageUploadURL: '{{ route("froala.upload") }}',
                language: 'zh_tw',
                toolbarButtons: [
                    ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough'],
                    [ 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify','textColor', 'backgroundColor'],
                    ['formatOLSimple', 'formatUL', 'insertLink','insertImage','insertFile'],
                ],
                events: {
                    /*
                    'image.beforeUpload': function (images) {
                        // Return false if you want to stop the image upload.
                    },
                    'image.uploaded': function (response) {
                        // Image was uploaded to the server.
                    },
                    'image.inserted': function ($img, response) {
                        // Image was inserted in the editor.
                    },
                    'image.replaced': function ($img, response) {
                        // Image was replaced in the editor.
                    },
                    'image.error': function (error, response) {
                        // Bad link.
                        if (error.code == 1) { ... }
                        // No link in upload response.
                        else if (error.code == 2) { ... }
                        // Error during image upload.
                        else if (error.code == 3) { ... }
                        // Parsing response failed.
                        else if (error.code == 4) { ... }
                        // Image too text-large.
                        else if (error.code == 5) { ... }
                        // Invalid image type.
                        else if (error.code == 6) { ... }
                        // Image can be uploaded only to same domain in IE 8 and IE 9.
                        else if (error.code == 7) { ... }
                        // Response contains the original server response to the request if available.
                    }
                    */
                }
            });
        </script>
    </body>
</html>
