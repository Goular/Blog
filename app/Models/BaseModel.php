<?php
namespace App\Models;

/**
 * 模型基础类
 * Class BaseModel
 * @package App\Models
 */
class BaseModel
{
    /**
     * 获取树状结构的数据
     * @param $objects
     * @param int $id
     * @param int $level
     * @return array
     */
    protected function getTree($objects, $id = 0, $level = 0)
    {
        static $arrs = array();
        foreach ($objects as $obj) {
            if ($obj->parent_id == $id) {
                $obj['level'] = $level;
                $arrs[] = $obj;
                $this->getTree($objects, $obj['id'], $level + 1);
            }
        }
        return $arrs;
    }

}