<?php

// 公共函数库
use think\facade\Db;
/**
 * 热点文章
 */
function get_hot_articles($limit = 5) {
    $res = Db::table('blog_article')->order('pv desc')->limit($limit)->select();
    return $res;
}

/**
 * 最新文章
 */
function get_recent_articles($limit = 5) {
    $res = Db::table('blog_article')->order('created_time desc')->limit($limit)->select();
    return $res;
}

/**
 * 系列文章
 */
function get_series_articles($series_id,$limit = 5) {
    if($series_id){
        $res = Db::table('blog_article')
            ->where('status',2) //上架
            ->where('series_id',$series_id)
            ->order('created_time desc')
            ->limit($limit)->select();
        return $res;
    }
    return [];
}

/**
 * 分类
 */
function get_categories($type=0, $pid=0) {
    $where = [];
    if($type or $pid){
        $where['type'] = $type;
        $where['pid'] = $pid;
    }
    $res = Db::table('blog_category')->where($where)->order('sort desc')->select()->toArray();
    return $res;
}

/**
 * 标签
 */
function get_tags() {
    $where = [];
    $res = Db::table('blog_tag')->where($where)->field('name')->select();
    return $res;
}

/**
 * 系列
 */
function get_series() {
    $where['show'] = 1; //上架的系列组
    $res = Db::table('blog_series')->where($where)->select();
    return $res;
}

/**
 * 友情链接
 */
function get_links($limit = 10) {
    $res = Db::table('blog_link')->order('weight desc')->limit($limit)->select();
    return $res;
}