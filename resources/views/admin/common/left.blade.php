<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="{{url('admin/index')}}" class="site_title"><i class="fa fa-paw"></i> <span>56C</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>John Doe</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i>首页</a>
                </li>
                <li><a><i class="fa fa-user"></i>用户管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="form.html">General Form</a></li>
                        <li><a href="form_advanced.html">Advanced Components</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="form_wizards.html">Form Wizard</a></li>
                        <li><a href="form_upload.html">Form Upload</a></li>
                        <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-book"></i>文章管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('admin/articleList')}}">文章列表</a></li>
                        <li><a href="{{url('admin/createArticle')}}">添加文章</a></li>
                        <li><a href="{{url('admin/categoryList')}}">栏目列表</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i>系统管理<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="tables.html">通用设置</a></li>
                        <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
