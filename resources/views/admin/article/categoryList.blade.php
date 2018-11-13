@extends('admin.layouts');
@section('title')
    栏目列表--56C系统
@stop
@section('css')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    @stop

@section('content')
    <div id="app">
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
                                    <input type="text" class="form-control" name="category[category_name]" placeholder="请输入栏目名称">
                                </div>
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
                                    <button type="submit" class="btn btn-success">提交</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>




            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <el-tree
                                :data="data"
                                :props="defaultProps"
                                accordion
                                @node-click="handleNodeClick">
                            <span>
          <el-button
                  type="text"
                  size="mini"
                  @click="() => append(data)">
            Append
          </el-button>
          <el-button
                  type="text"
                  size="mini"
                  @click="() => remove(node, data)">
            Delete
          </el-button>
        </span>
                        </el-tree>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @stop

@section('script')
    {{--@parent--}}
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: function() {
                return {
                    data: [{
                        label: '一级 1',
                        children: [{
                            label: '二级 1-1',
                            children: [{
                                label: '三级 1-1-1'
                            }]
                        }]
                    }, {
                        label: '一级 2',
                        children: [{
                            label: '二级 2-1',
                            children: [{
                                label: '三级 2-1-1'
                            }]
                        }, {
                            label: '二级 2-2',
                            children: [{
                                label: '三级 2-2-1'
                            }]
                        }]
                    }, {
                        label: '一级 3',
                        children: [{
                            label: '二级 3-1',
                            children: [{
                                label: '三级 3-1-1'
                            }]
                        }, {
                            label: '二级 3-2',
                            children: [{
                                label: '三级 3-2-1'
                            }]
                        }]
                    }],
                    defaultProps: {
                        children: 'children',
                        label: 'label'
                    }
                };
            },
            methods: {
                handleNodeClick(data) {
                    console.log(data);
                }
            }
        })
    </script>




    @stop


