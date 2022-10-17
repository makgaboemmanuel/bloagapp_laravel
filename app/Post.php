<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
// use Illuminate\Mail\Markdown;

class Post extends Model
{
    /*   user added code  */
    protected $dates = ['published_at'];

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute( $value ){

        $imageUrl = "";

        if( ! is_null($this->image) ){
            $imagePath = public_path() . "/img/" . $this->image ;

            if( file_exists( $imagePath ) ){
                $imageUrl = asset("img/" . $this->image) ;
            }
        }

        return $imageUrl;
    }

    public function getDateAttribute($value){
        return is_null( $this->published_at )? '' :  $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst(){
        return $this->orderBy('created_at', 'asc');
    }

    public function scopePublished(){
        return $this->where("published_at", "<=", Carbon::now()); /* "NOW()" */
    }

    /*  user recently added code  */
    public function getBodyHtmlAttribute($value){
        return $this->body ? Markdown::convertToHtml( e($this->body) ) : NULL;
    }

    public function getExerptHtmlAttribute($value){
        return $this->excerpt ? Markdown::convertToHtml( e($this->excerpt) ) : NULL;
    }

    /*  recently added code */
    public function category(){
        return $this->belongsTo(Category::class);
    }


}
