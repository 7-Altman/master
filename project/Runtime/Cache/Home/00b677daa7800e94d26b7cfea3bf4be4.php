<?php if (!defined('THINK_PATH')) exit();?><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>WTF?</title>
</head>
<script src="<?php echo (C("JS")); ?>util.js"></script>
<script src="<?php echo (C("JS")); ?>jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo (C("VUE")); ?>index.css">
<link rel="stylesheet" type="text/css" href="<?php echo (C("CSS")); ?>base.css">
<link rel="stylesheet" type="text/css" href="<?php echo (C("CSS")); ?>normalize.css">
<script src="<?php echo (C("VUE")); ?>vue.js"></script>
<script src="<?php echo (C("VUE")); ?>vue-resource.min.js"></script>
<script src="<?php echo (C("VUE")); ?>index.js"></script>
<div id="app">
    <template>

        <el-menu theme="dark" default-active="1" class="el-menu-demo" mode="horizontal" >
            <el-menu-item index="1">处理中心</el-menu-item>
            <el-submenu index="2">
                <template slot="title">我的工作台</template>
                <el-menu-item index="2-1">选项1</el-menu-item>
                <el-menu-item index="2-2">选项2</el-menu-item>
                <el-menu-item index="2-3">选项3</el-menu-item>
            </el-submenu>
            <el-menu-item index="3">订单管理</el-menu-item>
        </el-menu>
        <el-row class="tac">

            <!--sidebar start-->
            <el-col :span="4">
                <!--<h5>菜单</h5>-->
                <el-menu class="el-menu-vertical-demo" @select="handleSelect" @open="handleOpen" unique-opened=true >

                    <el-submenu :index="submenus.id" v-for="submenus in menus">
                        <template slot="title"><i class="el-icon-message"></i>{{submenus.text}}</template>
                        <el-menu-item :index="submenu.uri" v-for="submenu in submenus.items">{{submenu.text}}</el-menu-item>
                    </el-submenu>


                </el-menu>
            </el-col>
            <!--sidebar end-->

            <el-col :span=20>
                <el-breadcrumb separator="/" class="breadcrumb_padding">
                    <el-breadcrumb-item >首页</el-breadcrumb-item>
                    <el-breadcrumb-item>{{breadcrumb1}}</el-breadcrumb-item>
                    <el-breadcrumb-item>{{breadcrumb2}}</el-breadcrumb-item>
                </el-breadcrumb>
                <iframe id="checkListFrame" src="" frameborder="0" width="100%" height="80%" scrolling="auto"></iframe>
            </el-col>

        </el-row>


        <div id="footer">
            <hr>
            <footer class="text-center">
                <p>© 我的公司</p>
            </footer>
        </div>

    </template>

    <script>

        var Main = {
            data() {
            return {
                breadcrumb1 : "dashboard",
                breadcrumb2 : "",

                menus: [
                   {
                       id: "1",
                       text: "导航1",
                       items: [
                           {
                               text: "用户信息",
                               uri: "<?php echo U('/Home/UserInfo/index');?>",
                           },{
                               text: "表单2",
                               uri: "<?php echo U('/Home/UserInfo/index');?>  ",
                           },{
                               text: "表格1",
                               uri: "<?php echo U('/Home/UserInfo/index');?>",
                           },
                       ]
                   },
                ],
                menus1: {},
            }
        },
        mounted: function(){
            for(var ii = 0; ii < this.menus.length; ii ++)
            {
                this.menus1[this.menus[ii].id] = {}
                this.menus1[this.menus[ii].id]['text'] = this.menus[ii]['text']
                for(var jj = 0; jj < this.menus[ii].items.length; jj ++)
                {
                    this.menus1[this.menus[ii].id][this.menus[ii].items[jj]['uri']] = this.menus[ii].items[jj]
                }
            }

        },
        methods: {
            handleSelect(key, keyPath) {
                $(".el-menu-item").removeClass("is-active")
                document.getElementById("checkListFrame").src = key
                this.breadcrumb1 = this.menus1[keyPath[0]]['text']
                this.breadcrumb2 = this.menus1[keyPath[0]][keyPath[1]]['text']
            },
            handleOpen(key, keyPath) {
                // debugger
                // $(".el-submenu").removeClass("is-opened")
                // $("ul[class='el-menu']").css('display','none');
            },
        }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>

    <script type="text/javascript">   // iframe自动高度
    var iframeids=["checkListFrame"]var iframehide="yes"function dyniframesize(){var dyniframe=new Array()for(i=0;i<iframeids.length;i++){if(document.getElementById){dyniframe[dyniframe.length]=document.getElementById(iframeids[i]);if(dyniframe[i]&&!window.opera){dyniframe[i].style.display="block"if(dyniframe[i].contentDocument&&dyniframe[i].contentDocument.body.offsetHeight)dyniframe[i].height=dyniframe[i].contentDocument.body.offsetHeight;else if(dyniframe[i].Document&&dyniframe[i].Document.body.scrollHeight)dyniframe[i].height=dyniframe[i].Document.body.scrollHeight}}if((document.all||document.getElementById)&&iframehide=="no"){var tempobj=document.all?document.all[iframeids[i]]:document.getElementById(iframeids[i])tempobj.style.display="block"}}}if(window.addEventListener)window.addEventListener("load",dyniframesize,false)else if(window.attachEvent)window.attachEvent("onload",dyniframesize)else window.onload=dyniframesize
    </script>