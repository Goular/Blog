<?php

namespace App\Admin\Controllers;

use App\Entities\Article;
use App\Models\CategoryModel;
use App\Tools\Radom\RandomKey;
use App\Tools\Storage\FileUpload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ArticleController extends CommonController
{
    public function index()
    {
        $articles = Article::orderBy("updated_at", "desc")->paginate(4);
        return view("backend.article.index", compact('articles'));
    }

    public function create()
    {
        $model = new CategoryModel();
        //获取父级分类
        $categories = $model->getTrees();
        //dd($categories);
        return view("backend.article.create", compact('categories'));
    }

    public function store(Request $request)
    {
        //校验
        $this->validate($request, [
            "cate_id" => "required|numeric",
            "title" => "required",
            "editor" => "nullable",
            "thumb" => "nullable",
            "tag" => "nullable",
            "content" => "required",
        ], [
            'title.required' => '标题不能为空',
            'content.required' => '正文不能为空',
        ]);

        //逻辑 && 渲染
        $entity = new Article();
        if ($entity->create(request()->all())) {
            return redirect("admin/articles");
        } else {
            return back()->withInput()->withErrors("添加失败");
        }
    }

    public function show($id)
    {
        return "1122330";
    }

    public function edit($id)
    {
        try {
            $model = new CategoryModel();
            //获取父级分类
            $categories = $model->getTrees();
            $selectArticle = Article::findOrFail($id);
            return view("backend.article.update", compact('categories', 'selectArticle'));
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "cate_id" => "required|numeric",
            "title" => "required",
            "editor" => "nullable",
            "thumb" => "nullable",
            "tag" => "nullable",
            "content" => "required",
        ], [
            'title.required' => '标题不能为空',
            'content.required' => '正文不能为空',
        ]);
        $model = Article::find($id);
        if ($model) {
            if ($model->update(request()->all())) {
                return redirect("admin/articles");
            } else {
                return back()->withInput()->withErrors("修改失败");
            }
        } else {
            return back()->withInput()->withErrors("修改的分类找不到");
        }
    }

    public function destroy($id)
    {
        $model = Article::find($id);
        if ($model->delete()) {
            return $this->ajaxSuccessOperate('删除成功');
        } else {
            return $this->ajaxFailOperate('删除失败');
        }
    }

    /**
     * 缩略图上传
     */
    public function upload_thumb(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {//判断文件是否有效
            $entension = $file->getClientOriginalExtension(); //获取上传文件的后缀.
            $fileUpload = new FileUpload();
            $randomKey = new RandomKey();
            $newName = date('YmdHis') . '@' . $randomKey->randomkeys(8) . '.' . $entension;
            $saveFilePath = 'uploads/article_thumb/' . $newName;
            if ($fileUpload->saveFile($saveFilePath, $file->getRealPath())) return $this->toJson(["fileDomain" => "http://" . env('QINIU_DOMAIN') . '/', "filePath" => $saveFilePath]);
            else return $this->ajaxFailOperate("上传文件失败!");
        }
    }

    /**
     * 文章内容图片上传,可能包含各种内容
     */
    public function upload_content(Request $request)
    {
        $file = $request->file('upload');
        $cb = request("CKEditorFuncNum"); //获得ck的回调id
        if ($file->isValid()) {//判断文件是否有效
            $entension = $file->getClientOriginalExtension(); //获取上传文件的后缀.
            $fileUpload = new FileUpload();
            $randomKey = new RandomKey();
            $newName = date('YmdHis') . '@' . $randomKey->randomkeys(8) . '.' . $entension;
            $saveFilePath = 'uploads/article_content/' . $newName;
            $showFilePath = 'http://' . env('QINIU_DOMAIN') . '/' . $saveFilePath;
            if ($fileUpload->saveFile($saveFilePath, $file->getRealPath()))
                return "<script>window.parent.CKEDITOR.tools.callFunction('$cb', '$showFilePath', '');</script>";
            else return "<script>window.parent.CKEDITOR.tools.callFunction($cb, '', '上传失败!');</script>"; //图片上传失败，通知ck失败消息
        }
    }
}
