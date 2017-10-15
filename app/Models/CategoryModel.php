<?php
namespace App\Models;

use App\Entities\Category;

class CategoryModel extends BaseModel
{
    /**
     * 获取树状的分类结构
     */
    public function getTrees()
    {
        $categories = Category::all();
        $trees = $this->getTree($categories);
        return $trees;
    }

    /**
     * 更改分类的排序级别
     * @param $id 分类的ID
     * @param $value 修改的值
     */
    public function changeOrder($id, $value)
    {
        return false;
    }
}
