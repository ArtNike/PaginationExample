$(document).ready(function () {
    var articlePage = 1;
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
        let text = $($('#summernote').summernote('code')).text();
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
                location.reload();
            });
        });

    });

    function getArticles(page) {
        console.log(page);
        $.ajax({
            type: 'GET',
            url: '/api/articles/'+page,
        }).done(function (data) {
            if(data.status){
                console.log(data.articles);
                drawArticles(data.articles)
            }
        });
    }

    function drawArticles(articles){
        for(let i = 0; i < articles.length; i++){
            let elem = $('#article').clone();
            elem.find('#text').text(articles[i].content);
            elem.find('#title').text(articles[i].title);
            elem.find('#date').text(articles[i].created_at);
            elem.find('#article-url').text(articles[i].url);
            elem.find('#article-url').attr('href', articles[i].url);
            elem.find('#image').attr('src', '/images/'+articles[i].image);
            elem.appendTo('#force-overflow');
            elem.css('display', 'block');
        }
    }

    getArticles(articlePage);

});
