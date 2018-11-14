@extends('admin.layouts')
@section('title')
    添加文章
    @stop
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('static/layui/css/layui.css')}}"  media="all">
    @stop
@section('content')
    {{--<div class="page-title">--}}
        {{--<div class="title_left">--}}
            {{--<h3>添加文章</h3>--}}
        {{--</div>--}}

        {{--<div class="title_right">--}}
            {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                    {{--<span class="input-group-btn">--}}
                      {{--<button class="btn btn-default" type="button">Go!</button>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><small>添加文章</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('admin/addArticle')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">标题:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12">
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">xxxx</label>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">所属栏目</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="category_id" class="form-control" required>
                                    <option value="1">php</option>
                                    <option value="press">mysql</option>
                                    <option value="net">linux</option>
                                    <option value="mouth">前端</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">作者</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="author" required="required" value="56C" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">内容</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="layui-textarea" id="content_id" name="content" style="display: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">重置</button>
                                <button type="submit" class="btn btn-success">提交</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop

@section('script')
    @parent
    <script src="{{asset('static/layui/layui.js')}}" charset="utf-8"></script>

    <script>
        layui.use('layedit', function(){
            var layedit = layui.layedit
                ,$ = layui.jquery;
            //构建一个默认的编辑器
            var index = layedit.build('content_id');
        });
    </script>
    @stop
