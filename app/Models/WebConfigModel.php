<?php
namespace App\Models;

use App\Entities\FriendLink;
use App\Entities\Navigation;

/**
 * 网站配置类的内容
 * Class WebConfigModel
 * @package App\Models
 */
class WebConfigModel extends BaseModel
{
    /**
     * 更改导航链接的排序级别
     * @param $id 分类的ID
     * @param $value 修改的值
     */
    public function changeOrder($id, $value)
    {
        $navigation = Navigation::find($id);
        if (!isset($navigation)) return false;
        $navigation->order = $value;
        $navigation->save();
        return true;
    }
}