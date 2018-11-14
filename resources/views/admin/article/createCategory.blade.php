@extends('admin.layouts');
@section('title')
    添加--56C系统
@stop
@section('css')
    @parent
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <script src="{{asset('static/js/vue.js')}}"></script>
    <script src="{{asset('static/js/axios.min.js')}}"></script>
@stop

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>栏目列表</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="{{url('admin/createCategory')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">所属栏目</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="category[parent_id]" class="form-control">
                                    <option value="0">一级栏目</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">栏目名称</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" required :value="name" name="category[category_name]" placeholder="请输入栏目名称">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">栏目名称必填,长度为2~</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">是否展开</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" class="flat"  checked name="category[is_expand]"> 否
                                    </label>
                                    <label>
                                        <input type="radio" value="1" class="flat" name="category[is_expand]"> 是
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">重置</button>
                                <button type="button" class="btn btn-success" @click="_submit()">提交</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                name: ''
            },
            methods:{
                _submit(){
                   if($this.name==''){

                   }
                }
            }
        })
    </script>
    @parent
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>






@stop


