<?php /*a:3:{s:58:"E:\WWW\phpPro\phpblog\app\admin\view\Content\post_tag.html";i:1623058122;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>  - wekenw</title>
    <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>

<script src="/static/admin/xm-select-v1.2.2/xm-select.js"></script>

<body>
<form action="" class="layui-form" enctype="multipart/form-data" method='post' style="margin:15px;">

    <div class="layui-form-item">
        <label class="layui-form-label">文章标签</label>
        <div class="layui-input-block">
            <div id="tags" class="xm-select-demo"></div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分类专栏</label>
        <div class="layui-input-block">
            <div id="categories" class="xm-select-demo"></div>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">文章类型</label>
        <div class="layui-input-block">
            <select name="type" id="type">
                <option value=""></option>
                <option value="1" selected="">原创</option>
                <option value="2">转载</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">发布形式</label>
        <div class="layui-input-block">
            <input type="radio" name="public" value="1" title="公开" checked="">
            <input type="radio" name="public" value="2" title="私密">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" id="postSubmit" class="layui-btn" lay-submit="" lay-filter="postSubmit">发布文章</button>
            <button type="button" id="closeIframe" class="layui-btn layui-btn-primary">取消</button>
        </div>
    </div>
</form>



<script>
    var tags = '';
    function tagsRender(jsonData){
        tags = xmSelect.render({
            el: '#tags',
            name: 'tags',
            filterable: true,
            max: 3,
            maxMethod(seles, item){
                layer.msg('至多选3个标签啊', {icon: 5});
            },
            searchTips: '搜索不存在则创建条目',
            create: function(val, arr){
                if(arr.length === 0){
                    return {
                        name: '标签创建-' + val,
                        value: val
                    }
                }
            },
            data: jsonData
        })
    }
    var categories = '';
    function cateRender(jsonData){
        categories = xmSelect.render({
            el: '#categories',
            name: 'categories',
            radio: true,
            filterable: true,
            clickClose: true,
            searchTips: '搜索不存在则创建条目',
            create: function(val, arr){
                if(arr.length === 0){
                    return {
                        name: '分类创建-' + val,
                        value: val
                    }
                }
            },
            data: jsonData
        })
    }

</script>
</body>
</html>

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/static/admin/layui.js"></script>
<script>

    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer;

        //监听提交
        form.on('submit(postSubmit)', function(data){
            // console.log(data.field);
            // console.log(data.field.categories);
            // console.log(data.field.tags);

            //console.log(categories.getValue('nameStr'));
            //console.log(categories.getValue('valueStr'));
            if(!tags.getValue('nameStr')){
                layer.msg('文章标签至少给打上一个呀', {icon: 5});
                return false;
            }
            if(!data.field.categories){
                layer.msg('分类专栏必选', {icon: 5});
                return false;
            }
            parent.$("input[name='tag']").val(tags.getValue('nameStr')); //xselect 自己的获取值方式
            parent.$("input[name='cate']").val(categories.getValue('nameStr'));  // xselect 自己的获取值方式
            parent.$("input[name='type']").val(data.field.type);
            parent.$("input[name='public']").val(data.field.public);
            parent.$("#postArt").submit();
            parent.layer.close(index);
            return false;
        });

        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        //关闭iframe
        $('#closeIframe').click(function(){
            parent.layer.close(index);
        });

        $.ajax({
            url:'/admin/content/getdata',
            dataType:'json',
            type:'POST',
            data:{},
            success:function(data){
                tagDatas = data.tag;
                cateDatas = data.cate;
                // console.log(tagDatas);
                // console.log(cateDatas);
                tagsRender(tagDatas);
                cateRender(cateDatas);
            }
        })

    });
</script>
