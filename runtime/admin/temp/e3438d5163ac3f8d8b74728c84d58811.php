<?php /*a:3:{s:58:"E:\WWW\phpPro\phpblog\app\admin\view\Content\classify.html";i:1623723916;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>  - wekenw</title>
    <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>
<body>
    <div id="showTree" class="demo-tree demo-tree-box" style="margin: 15px; "></div>
</body>
</html>

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/static/admin/layui.js"></script>
<script>

    layui.use(['tree', 'util'], function(){
        var tree = layui.tree
            ,layer = layui.layer
            ,util = layui.util

        $.ajax({
            url:'/admin/content/cate_classify',
            dataType:'json',
            type:'POST',
            data:{},
            success:function(data){
                show_render(data.data);
            }
        })


        window.show_render = function(dataJson) {
            //开启节点操作图标
            tree.render({
                elem: '#showTree'
                ,id: 'CateId' //定义索引
                ,data: dataJson
                ,spread:true //节点是否初始展开
                ,edit: ['add','update','del'] //操作节点的图标
                ,limitNodeAddLevel:2 //设置第X节点不允许添加操作
                ,limitNodeDelLevel:1 //设置第X节点不允许删除操作
                ,text: {
                    defaultNodeName: '输入已存在一级分类' //节点默认名称
                    ,none: '无数据' //数据为空时的提示文本
                }
                ,click: function(obj){
                    layer.msg(JSON.stringify(obj.data));
                },operate: function(obj){
                    var type = obj.type; //得到操作类型：add、edit、del
                    var data = obj.data; //得到当前节点的数据
                    var elem = obj.elem; //得到当前节点元素

                    var parent = elem.parent().prev().find('.layui-tree-txt').html(); //得到父级内容

                    //var id = data.id; //得到节点索引
                    if(type === 'add'){ //增加节点
                        //返回 key 值
                        //return 123;
                    } else if(type === 'update'){ //修改节点
                        console.log(obj);
                        var addCate = elem.find('.layui-tree-txt').html(); //得到修改后的内容
                        dealCate(parent,addCate,type);

                    } else if(type === 'del'){ //删除节点
                        console.log(data.id);
                        dealCate(parent,data.id,type);
                    }

                }
            });
        }

        window.dealCate = function(parentCon,dealData,type){
            $.ajax({
                url:'/admin/content/deal_cate',
                dataType:'json',
                type:'POST',
                data:{'parent':parentCon,'deal':dealData,'type':type},
                success:function(data){
                    if(data.code === 1){

                        layer.msg('归类成功', {icon: 6});
                    }else{
                        layer.msg('归类失败', {icon: 5});
                    }

                    //重载
                    $.ajax({
                        url:'/admin/content/cate_classify',
                        dataType:'json',
                        type:'POST',
                        data:{},
                        success:function(dataJson){
                            //可以重载所有基础参数
                            tree.reload('CateId', {
                                data: dataJson.data
                            });
                        }
                    })

                }
            })
        }


    });
</script>
