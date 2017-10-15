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
        $categories = Category::orderBy('order', 'asc')->get();
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
        $category = Category::find($id);
        if (!isset($category)) return false;
        $category->order = $value;
        $category->save();
        return true;
    }

    /**
     * 获取指定父节点的一级子节点
     * @param int $parent_id
     */
    public function getChildrenCategories($parent_id = 0)
    {
        return Category::where('parent_id', $parent_id)->orderBy('order', 'asc')->get();
    }
}
