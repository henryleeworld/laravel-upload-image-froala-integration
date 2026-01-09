<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.4.0/css/froala_editor.pkgd.min.css" integrity="sha512-Wwzj0ePWXFdVtzK9o4CRoKHedL/d+W/k7alVa/uCldhDj8sqIGxjE106HXEbgUv5jDwTNcEJnNsqw9oUhfPPIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.4.0/js/froala_editor.pkgd.min.js" integrity="sha512-i09bneo70Cep9LpgwV7HlZ0J+VcAqZCKtBE5iqNdb9WNTjLoafpymTNlqIMDiyCzFEjO6c0X66T1XJjYsjPBmA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.4.0/js/languages/zh_tw.min.js" integrity="sha512-jGhvRBJ2uepK1idfbWV+3fOSmyvfTLBcTwJP7TrBAvprEQv8v3AztnKwqnRkf/FuDbDGbKPxI4ASZYt/BONI3A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
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
