<?php
namespace App\Models;

use App\Entities\FriendLink;

class FriendLinkModel extends BaseModel
{
    /**
     * 更改友情链接的排序级别
     * @param $id 分类的ID
     * @param $value 修改的值
     */
    public function changeOrder($id, $value)
    {
        $friendLink = FriendLink::find($id);
        if (!isset($friendLink)) return false;
        $friendLink->order = $value;
        $friendLink->save();
        return true;
    }
}