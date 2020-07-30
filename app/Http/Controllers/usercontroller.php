<?php


namespace App\Http\Controllers;
use Session;
use App\Post;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailme;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Validation\Rule; 

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function docs(){
        return view('welcome');
    }
  
   public function login(Request $r){
       //   $r->session()->forget('daata');
       return view('login1');
   }
   public function register(Request $r){
    return view('register');

}
public function insert(Request $r){
    
    $name=$r->name;
    $email=$r->email;
    $password= $r->password;
    $cpassword=$r->cpassword;
    $radio=$r->gender;
    $check=$r->check;
    $select=$r->select;
    $dob=$r->dob;
    //die('hii');


     
    $r->validate([
        'name' => [
            'required',
               'min:4'
        ],
       
        'password' => 'required',
        'cpassword' => 'required|same:password',
        'gender' => [
            'required'
        ],
        'check' => [
            'required'
        ],
        'select' => [
            'required'
        ],
        
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('admin')
        ],
       
       
    ]);


   
    
    $data=array('name'=>$name,'email'=>$email,'password'=>$password,'cpassword'=>$cpassword,'radio'=>$radio,'check'=>$check,'select'=>$select,'dob'=>$dob);
    //Session::put('variableName', $data);
    Mail::to($data['email'])->send(new mailme($data));
  DB::table('admin')->insert($data);

  
  //return $data;
    //echo $thisUser;die();
   return redirect('login1')->with('success','register succesfully please login!');
}

public function accountlogin(Request $r){
    $email=$r->email;
   
    $password=$r->password;
   
  

    $r->validate([
        'email' => [
            'required',
            'email',
            'max:255'
            
        ],
        'password' => 'required',
        
    ]);
    $data= DB::select('select id from admin where email = ? and password=?',[$email,$password]);
    
    //print_r($data);die();
    if (count($data) == 1) {
        $r->session()->put('data',$data);
          
        return redirect('dashboard');
 
}
else{
    return back()->with('error','login failed please try again!');
}
}

public function conformpassword(){
    

    return view('forgetpassword');
}
public function forgetpassword(Request $r){
    $email=$r->email;
    $password=$r->password;
    $cpassword=$r->cpassword;
   
   
    $r->validate([
        'email' => [
            'required',
            'email',
            'max:255'
            
        ],
        'password' => 'required',
        'cpassword' => 'required|same:password',
    ]);
  
    $data=  DB::update('update admin set password = ?, cpassword=? where email = ?',[$password,$cpassword,$email]);
  //  echo $data;die();
    if($data==1){
        return redirect('login1')->with('success','Your password is ready please login!');
    }
   else{
    return redirect('login1')->with('error','Your email is not register please register!');;
   }
} 


public function publish(Request $r){
   
    $data1=$r->session()->get('data');
       //$id=$data1[0]->id;
      // dd($data1);
       if(isset($data1)){
        $id=$data1[0]->id;
        $post3 =DB::select('select COUNT(users_id) as tcount from post where users_id='.$id );
        // dd($post3);
      
   // $post3=DB::table('posts')->where('userss_id',$id)->select(DB::raw('count(userss_id) as tcount'))->get();
  
  //$post3=post::where('userss_id',$id)->select(DB::raw('count(userss_id) as tcount'))->get();
  
        $r->session()->put('post3',$post3);
        $message3=$r->session()->get('post3');
        $tcount=$message3[0]->tcount;
  
       // $result = DB::table('postes')
       // ->where(['status'=>'1','user_id'=>$id])
       // ->select(DB::raw('count(user_id) as pcount'))
      //  ->get();
      //  return $result;
  
  
  
  $post1 =DB::select('select COUNT(users_id) as pcount from post where result=0  and users_id='.$id );
   // $post1=DB::table('posts')->where(['result'=>'1','userss_id'=>$id])->select(DB::raw('count(userss_id) as pcount'))->get();
  
  
      $r->session()->put('post1',$post1);
      $message1=$r->session()->get('post1');
      $pcount=$message1[0]->pcount;
  
  
  $post2 =DB::select('select COUNT(users_id) as upcount from post where result=1  and users_id='.$id );
  //$post2=DB::table('posts')->where(['result'=>'0','userss_id'=>$id])->select(DB::raw('count(userss_id) as upcount'))->get();
  
      $r->session()->put('post2',$post2);
      $message2=$r->session()->get('post2');
      $upcount=$message2[0]->upcount;
  
       
      
     // dd($post1);
      return view('dashboard')->with($data1);
       }
       else{
         return abort('404');
       }
  
  }
  
  




public function accountselect(Request $r){
    $user= $r->session()->get('data');
    $id=$user[0]->id;
   
  // dd($user);
 $users=DB::select('select *from post where users_id='.$user[0]->id);
  //$users=DB::table('posts')->where('userss_id',$user[0]->id)->get();
  //------------------------query builder-------------------------------------
  //$users=Post::where('userss_id',$id)->get();



  //---------------------------model-----------------------------------------------------
  return view('accountselect',['users'=>$users]);
 // return view('accountselect');
 
}


public function post(Request $r){

    $data2=$r->session()->get('data');
    //dd($data2);
     // dd($id);
       if(isset($data2)){
      
        $id=$data2[0]->id;

       // dd($id);
    
      return view('post');
 }else{
      return abort('404');

  }
  
  }
  public function postinsert(Request $request)
  {
    
    $request->validate([
      'title'=>'required',
      'description'=>'required',
      'result'=>'required',
    
 'filename' => 'required',
 'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);


if ($request->hasFile('filename')) {
$image = $request->file('filename');

$name = $image->getClientOriginalName();

$destinationPath = public_path('/images');
$image->move($destinationPath, $name);
//die('hiii');
$userImage = new post;
$userImage->title =$request->title;

$userImage->description = $request->description;
$userImage->result = $request->result;
$info=$request->session()->get('data');
$id=$info[0]->id;
$userImage->users_id = $id;

//$userImage->size =$request->name;
$userImage->image = $name;

      
//dd($userImage);
$userImage->save();
// return back()->with('success','image successfully added!');
 // die('hiiiiiii');
  return redirect('accountselect');
}
}



public function accountedit(Request $r,$id) {
     $users = DB::select('select * from post where id = ?',[$id]);
   
    // $users=DB::table('posts')->where('id',[$id])->get();//query builder
   //  $users=Post::where('id', $id)->get();
             
     return view('accountedit',['users'=>$users]);
     }

     public function accountupdate(Request $request,$id) {
        // dd($request->input());
         if ($request->hasFile('filename')) {
           $image = $request->file('filename');
          // dd($image);
           $name = $image->getClientOriginalName();
          // dd($name);
         //  $size = $image->getClientSize();
       //  dd($size);
           $destinationPath = public_path('/images');
           $image->move($destinationPath, $name);
          
         
       
         
        
       $users=Post::where('id',[$id])->update(['title'=>$request->title,'description'=>$request->description,'result'=>$request->result,'image'=>$name]);
        //dd($users);
             return redirect('accountselect');
       }
       else{
           $users=Post::where('id',[$id])->update(['title'=>$request->title,'description'=>$request->description,'result'=>$request->result]);
             //dd($users);
         return redirect ('accountselect');
       }
       }

       public function accountdelete($id) {
        //   DB::delete('delete from posts where id = ?',[$id]);
      // $users=  DB::table('posts')->where('id',[$id])->delete();//---------querybuilder---------------------------
       $users=Post::where('id',[$id])->delete();
       //-----------------model------------------------------------
       
         echo "Record deleted successfully.";
         return redirect()->action('UserController@accountselect');
         }
       
         public function logout(Request $r){

            $r->session()->forget('data');
           $r->session()->forget('post1');
            $r->session()->forget('post2');
           $r->session()->forget('post3');


            return view('login1');
         }

  




}
