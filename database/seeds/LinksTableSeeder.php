<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => '腾讯网',
                'title' => '腾讯是中国IM第一网站',
                'url' => 'http://www.tencent.com',
                'order' => 1,
            ],
            [
                'name' => '百度网',
                'title' => '百度是中文搜索第一的网站',
                'url' => 'http://www.baidu.com',
                'order' => 2,
            ]
        ];
        \DB::table("friend_links")->insert($datas);
    }
}
