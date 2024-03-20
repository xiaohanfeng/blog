<?php
namespace app\admin\model;
use think\facade\{Db};
use think\Model;
class ResumeModel extends Model
{

    static protected $connection = 'mongo';//连接名称
    static protected $name = 'resume';//连接数据表


    /**
     * 集合文档名称
     *  Db::connect('mongo')->table(表全名)
     * @return mixed
     */
    public static function  collection(){
        return Db::connect(self::$connection)->name(self::$name);
    }

    /**
     * 聚合操作
     * @param array $pipeline
     * @param false $bool【为真统计用，只返回一条记录；为假时返回全部记录】
     * @return int|mixed
     */
    public function mongo($pipeline = [],$bool = false){
        $data = $this->collection()->cmd([
            'aggregate'=>$this->name,
            'pipeline'=>$pipeline,
            'explain'=>false,
        ]);
        return $bool ?  (!empty($data[0]) ?$data[0]: 0) : $data;
    }

    /**
     * 保存
     * @param string $mobile
     * @param string $password
     * @return rs
     */
    public function resumeSave($mobile, $password){
        $data = [
            'name' => '',
            'mobile' => $mobile,
            'password' => $password,
            'status' => 1,
            'add_time' => time()
        ];
        $rs = Db::table('user')->insert($data);
        if($rs){
            return true;
        }
        return false;
    }

    /**
     * 根据用户ID获取信息
     * @param int $id
     * @return rs
     */
    public function getResumeInfo($id){
        $rs = false;
        $rs = $this->collection()->table('resume')
            ->field('name')
            ->where([
                ['_id', '=', $id],
            ])
            ->select();
        if(!$rs->isEmpty()){
            return $rs[0];
        }
        return $rs;
    }

}