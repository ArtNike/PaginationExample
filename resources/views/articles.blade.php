@section('css')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link href="/css/articles.css" rel="stylesheet">
@stop

@section('js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="/js/articles.js"></script>
@stop
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <h2>Новости</h2>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <label for="title">Заголовок</label>
                    <form id="imageForm">
                        <input type="url" class="form-control" id="titleInput" placeholder="Заголовок">
                    </form>
                </div>


                <div class="row" id="redactor">
                    <div class="" id="summernote"></div>
                </div>



                <div class="container">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <form id="imageForm" name="imageForm">
                                    <label for="imageInput">Изображение</label>
                                    <input type="file" class="form-control" id="imageInput" name="imageInput">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="urlInput1">Ссылки</label>
                                <form id="imageForm">
                                    <input type="url" class="form-control" id="urlInput1" placeholder="http://">
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-fluid" style="padding-bottom: 10px;">
                    <div class="row">
                        <div class="col-md-11"></div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-success" id="save">Сохранить</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="scrollbar scrollbar-primary">
                        <div class="force-overflow" id="force-overflow">

                            <div class="panel panel-default" id="article" style="padding: 20px; display: none">
                                <div class="panel-body">
                                    <div class="row">
                                        <p id="date" class="text-left text-bold">09.09.2018</p>
                                    </div>
                                    <div class="row">
                                        <img id="image" src="http://www.midlandersalumni.com/images/_global/default-blog-post.jpg"
                                             class="img-responsive center-block" alt="Responsive image">
                                    </div>
                                    <div class="row" style="padding-top: 25px">
                                        <p style="text-align: center"><b id="title">Lorem Ipsum</b></p>
                                    </div>
                                    <div class="row" style="padding-top: 10px">
                                        <p id="text">
                                            <b>&nbsp; &nbsp; Lorem Ipsum </b>- это текст-"рыба", часто используемый в
                                            печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов
                                            на латинице с начала XVI века. В то время некий безымянный печатник создал
                                            большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для
                                            распечатки образцов. Lorem Ipsum не только успешно пережил без заметных
                                            изменений пять веков, но и перешагнул в электронный дизайн. Его
                                            популяризации в новое время послужили публикация листов Letraset с образцами
                                            Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной
                                            вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <a id="article-url" href="https://vk.com" target="_blank">vk.com</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

@stop
