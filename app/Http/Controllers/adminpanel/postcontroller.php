<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Category;
use Auth;
class postcontroller extends Controller
{
    function __construct(){

        $this->post= new post;
        $this->category= new Category;
    }
    public function all_post($id=NULL){
                $all_category=$this->category::where('category_type','post')->orderBy('id', 'DESC')->get();
                if($id==Null){
                    $all_post=$this->post::with('categories')->orderBy('id', 'DESC')->get();
                    return view('adminpanel.post.all_post',compact('all_post','all_category'));
                }
                else{
                    $all_post=$this->post::with('categories')->where('category_id',$id)->orderBy('id', 'DESC')->get();
                    return view('adminpanel.post.all_post',compact('all_post','all_category'));
                }

         }

    public function add_post(){
                     $all_category=$this->category::where('category_type','post')->orderBy('id', 'DESC')->get();
                    return view('adminpanel.post.add_post',compact('all_category'));
                }
   public function save_post(Request $request){
               // dd($request);
                    $this->post->name=$request->name;
                    $this->post->slug=phpslug($request->name);
                    $this->post->description=$request->description;
                    $this->post->category_id=$request->category_id;
                    $this->post->meta_keyword=$request->meta_keyword;
                    $this->post->user_id=Auth::user()->id;
                     if($request->file('featured_image')){
                         $file= $request->file('featured_image');
                         $filename= date('YmdHi').uniqid().$file->getClientOriginalName();
                         $file-> move(public_path('images'), $filename);
                        $this->post->featured_image= $filename;
                     }

                     $success= $this->post->save();
                     if($success==true){
                         toast('Successfully save!','success')->timerProgressBar()->width('400px');

                             return redirect()->route('all_post');
                         }else{
                             toast('Something went wrong!','error')->timerProgressBar()->width('400px');
                             return redirect()->route('add_post');
                         }
     }
    public function edit_post(Request $request,$id){
                    $current_post = $this->post::find($id);
                    return view('adminpanel.post.edit_post',compact('current_post'));
                }

    public function update_post(Request $request,$id){
                    $update=$this->post->find($id);
                         $update->name=$request->name;
                         $update->slug=phpslug($request->name);
                         $update->description=$request->description;
                         $update->category_id=$request->category_id;
                         $update->meta_keyword=$request->meta_keyword;
                         $update->user_id=Auth::user()->id;
                          if($request->file('featured_image')){
                              $file= $request->file('featured_image');
                              $filename= date('YmdHi').uniqid().$file->getClientOriginalName();
                              $file-> move(public_path('images'), $filename);
                             $update->featured_image= $filename;
                          }

                          $success= $update->update();
                          if($success==true){
                              toast('Successfully update record!','success')->timerProgressBar()->width('400px');

                                  return redirect()->route('all_post');
                              }else{
                                  toast('Something went wrong!','error')->timerProgressBar()->width('400px');
                                  return redirect()->route('add_post');
                              }
          }

    public function single_post($id){
        $all_category=$this->category::where('category_type','post')->orderBy('id', 'DESC')->get();
        $all_post=$this->post::orderBy('id', 'DESC')->take(2)->get();

        $single_post=$this->post->find($id);
        return view('adminpanel.post.single_post',compact('single_post','all_post','all_category'));

    }
}
