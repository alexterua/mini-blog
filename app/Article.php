<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'short_title', 'text', 'img'];

    public static function add($fields)
    {
        $article = new static();
        $article->title = $fields->title;
        $article->short_title = Str::length($fields->short_title) > 20
                                ? Str::limit($fields->short_title, 20)
                                : $article->title;
        $article->text = $fields->text;
        $article->author_id = rand(1, 4);

        $article->uploadImage($fields['img']);

        $article->save();
    }

    public static function edit($fields)
    {
        $article = static::find($fields->id);
        $article->title = $fields->title;
        $article->short_title = Str::length($fields->short_title) > 20 ? Str::limit($fields->short_title, 20) : $article->title;
        $article->text = $fields->text;

        $article->uploadImage($fields['img']);

        $article->update();
    }

    public static function remove($id)
    {
        $article = static::find($id);

        if ($article->img !== null) {
            unlink(public_path('/uploads/' . $article->img));
        }

        $article->delete();
    }

    public static function getOne($id)
    {
        return static::find($id);
    }

    public function uploadImage($image)
    {
        if ($image) {
            $filename = Str::random(20) . '.' . $image->extension();
            $image->move(public_path() . '/uploads', $filename);
            $this->img = $filename;
        }

    }
}
