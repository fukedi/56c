@extends('admin.layouts')
        @section('title')
        栏目列表
        @stop
@section('css')
    @parent
    <link href="{{asset('static/css/bootstrap-table.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static/css/jquery.treegrid.min.css')}}">
    <script src="{{asset('static/js/axios.min.js')}}"></script>
    @stop
@section('content')

    <body>
    <div class="container">
    <h4>栏目列表</h4>
    <table id="table"></table>
        {{--<p>{{dd($list)}}</p>--}}
    </div>
    </body>
    @stop

@section('script')
    @parent
    <script src="{{asset('static/js/bootstrap-table.min.js')}}"></script>
    <script src="{{asset('static/js/bootstrap-table-treegrid.js')}}"></script>
    <script src="{{asset('static/js/jquery.treegrid.min.js')}}"></script>
    <script type="text/javascript">
        var $table = $('#table');



        // var data = JSON.parse(
        //     '[{"id":1,"pid":0,"status":1,"name":"用户管理","permissionValue":"open:user:manage"},' +
        //     '{"id":2,"pid":0,"status":1,"name":"系统管理","permissionValue":"open:system:manage"},' +
        //     '{"id":3,"pid":1,"status":1,"name":"新增用户","permissionValue":"open:user:add"},' +
        //     '{"id":4,"pid":1,"status":1,"name":"修改用户","permissionValue":"open:user:edit"},' +
        //     '{"id":5,"pid":1,"status":0,"name":"删除用户","permissionValue":"open:user:del"},' +
        //     '{"id":6,"pid":2,"status":1,"name":"系统配置管理","permissionValue":"open:systemconfig:manage"},' +
        //     '{"id":7,"pid":6,"status":1,"name":"新增配置","permissionValue":"open:systemconfig:add"},' +
        //     '{"id":8,"pid":6,"status":1,"name":"修改配置","permissionValue":"open:systemconfig:edit"},' +
        //     '{"id":9,"pid":6,"status":0,"name":"删除配置","permissionValue":"open:systemconfig:del"},' +
        //     '{"id":10,"pid":2,"status":1,"name":"系统日志管理","permissionValue":"open:log:manage"},' +
        //     '{"id":11,"pid":10,"status":1,"name":"新增日志","permissionValue":"open:log:add"},' +
        //     '{"id":12,"pid":10,"status":1,"name":"修改日志","permissionValue":"open:log:edit"},' +
        //     '{"id":13,"pid":10,"status":0,"name":"删除日志","permissionValue":"open:log:del"}]');

        var data ='';

        $(function() {
            axios.post('getCategoryList',{
                'name':'sdsd'
            }).then(res=>{
                // console.log(res.data);
                $table.bootstrapTable({
                    data:res.data,
                    idField: 'id',
                    dataType:'jsonp',
                    columns: [
                        {field: 'id', title: 'ID', sortable: true, align: 'center'},
                        { field: 'category_name',  title: '名称' },
                        // {field: 'pid', title: '所属上级'},
                        { field: 'operate', title: '操作', align: 'center', events : operateEvents, formatter: 'operateFormatter' },
                    ],

                    // bootstrap-table-treegrid.js 插件配置 -- start

                    //在哪一列展开树形
                    treeShowField: 'category_name',
                    //指定父id列
                    parentIdField: 'parent_id',

                    onResetView: function(data) {
                        //console.log('load');
                        $table.treegrid({
                            initialState: 'collapsed',// 所有节点都折叠
                            // initialState: 'expanded',// 所有节点都展开，默认展开
                            treeColumn:1,
                            // expanderExpandedClass: 'glyphicon glyphicon-minus',  //图标样式
                            // expanderCollapsedClass: 'glyphicon glyphicon-plus',
                            onChange: function() {
                                $table.bootstrapTable('resetWidth');
                            }
                        });

                        //只展开树形的第一级节点
                        $table.treegrid('getRootNodes').treegrid('expand');

                    },
                    onCheck:function(row){
                        var datas = $table.bootstrapTable('getData');
                        // 勾选子类
                        selectChilds(datas,row,"id","pid",true);

                        // 勾选父类
                        selectParentChecked(datas,row,"id","pid")

                        // 刷新数据
                        $table.bootstrapTable('load', datas);
                    },

                    onUncheck:function(row){
                        var datas = $table.bootstrapTable('getData');
                        selectChilds(datas,row,"id","pid",false);
                        $table.bootstrapTable('load', datas);
                    },
                });
            });
        });

        // 格式化按钮
        function operateFormatter(value, row, index) {
            return [
                '<button type="button" class="RoleOfadd btn-small  btn-primary" style="margin-right:15px;"><i class="fa fa-plus" ></i>&nbsp;新增</button>',
                '<button type="button" class="RoleOfedit btn-small   btn-primary" style="margin-right:15px;"><i class="fa fa-pencil-square-o" ></i>&nbsp;修改</button>',
                '<button type="button" class="RoleOfdelete btn-small   btn-primary" style="margin-right:15px;"><i class="fa fa-trash-o" ></i>&nbsp;删除</button>'
            ].join('');

        }
        // 格式化类型
        function typeFormatter(value, row, index) {
            if (value === 'menu') {  return '菜单';  }
            if (value === 'button') {  return '按钮'; }
            if (value === 'api') {  return '接口'; }
            return '-';
        }
        // 格式化状态
        function statusFormatter(value, row, index) {
            if (value === 1) {
                return '<span class="label label-success">正常</span>';
            } else {
                return '<span class="label label-default">锁定</span>';
            }
        }

        //初始化操作按钮的方法
        window.operateEvents = {
            'click .RoleOfadd': function (e, value, row, index) {
                add(row.id);
            },
            'click .RoleOfdelete': function (e, value, row, index) {
                del(row.id);
            },
            'click .RoleOfedit': function (e, value, row, index) {
                update(row.id);
            }
        };
    </script>
    <script>
        /**
         * 选中父项时，同时选中子项
         * @param datas 所有的数据
         * @param row 当前数据
         * @param id id 字段名
         * @param pid 父id字段名
         */
        function selectChilds(datas,row,id,pid,checked) {
            for(var i in datas){
                if(datas[i][pid] == row[id]){
                    datas[i].check=checked;
                    selectChilds(datas,datas[i],id,pid,checked);
                };
            }
        }

        function selectParentChecked(datas,row,id,pid){
            for(var i in datas){
                if(datas[i][id] == row[pid]){
                    datas[i].check=true;
                    selectParentChecked(datas,datas[i],id,pid);
                };
            }
        }

        function test() {
            var selRows = $table.bootstrapTable("getSelections");
            if(selRows.length == 0){
                alert("请至少选择一行");
                return;
            }

            var postData = "";
            $.each(selRows,function(i) {
                postData +=  this.id;
                if (i < selRows.length - 1) {
                    postData += "， ";
                }
            });
            alert("你选中行的 id 为："+postData);

        }

        function add(id) {
            alert("add 方法 , id = " + id);
        }
        function del(id) {
            alert("del 方法 , id = " + id);
        }
        function update(id) {
            alert("update 方法 , id = " + id);
        }


    </script>
    @stop
