$(document).ready(function () {
    var getBase64 = function (file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadstart = function () {
            $('.img-uploaded').remove();
        };
        reader.onload = function () {
            $('.multi-img-result').append(
                '<div class="img-uploaded uploaded-image"><img src="' +
                URL.createObjectURL(file) +
                '" alt=""><input type="hidden" value="' + reader.result + '" name="images[]"></div>'
            );
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
    }
    $(document).on('change', '#image', function (event) {
        for (var i = 0; i < event.target.files.length; i++) {
            getBase64(event.target.files[i]);
        }
    });
});
