$(document).ready(function () {
    let summernote = $('#summernote');
    summernote.summernote({
        height: 350,
        placeholder: 'Новая новость',
        dialogsFade: true,
        disableDragAndDrop: true,
        shortcuts: false,
        disableResizeEditor: true,
        toolbar: [
            ['font', ['bold', 'italic', 'clear']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview']]
        ]
    });
    $('.note-statusbar').hide();
    summernote.summernote('focus');

    function getBase64(file, callback) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            callback(reader.result);
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
    }

    $('#save').click(function () {
        let title = $('#titleInput').val();
        let text = $('#summernote').summernote('code');
        let url = $('#urlInput1').val();
        let file = document.getElementById("imageInput").files[0];
        file = getBase64(file, function (file) {
            console.log(title);
            console.log(text);
            console.log(url);
            $.ajax({
                type: 'POST',
                url: '/admin/articles/add',
                dataType : "json",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({title: title, text: text, url: url, image: file}),
            }).done(function (data) {
                console.log(data);
            });
        });

    });

});
