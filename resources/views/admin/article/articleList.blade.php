@extends('admin.layouts')
@section('title')
    文章列表
    @stop

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                   文章列表<a href="{{url('admin/createArticle')}}" type="button" class="btn btn-success"><i class="fa fa-edit"></i> 添加</a>
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>所属栏目</th>
                        <th>作者</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $li)
                    <tr>
                        <td>{{$li->id}}</td>
                        <td>{{$li->title}}</td>
                        <td>{{$li->category_id}}</td>
                        <td>{{$li->author}}</td>
                        <td>{{$li->created_at}}</td>
                        <td>
                            <div class="btn-group  btn-group-xs">
                                <button class="btn btn-success" type="button">查看</button>
                                <button class="btn btn-primary" type="button">修改</button>
                                <button class="btn btn-danger" type="button">删除</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$list->render()}}
            </div>
        </div>
    </div>

    @stop

@section('script')
    @parent
    {{--<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>--}}
    @stop
