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

}
