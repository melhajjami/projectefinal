<?php
 
namespace App\Http\Controllers;
 
use \Crypt;
use App\joc;
use App\comentari;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
 
class comentarisController extends Controller
{
    public function __construct() { 
        $this->middleware('auth');
    }
 
    public function store(Request $request,$id)
    {
        $user = Auth::user();

        $comentari = new comentari;

        $comentari->comentari = $request->comentari;
        $comentari->user_id = $user->id;
        $comentari->joc_id = $id;
        
        $comentari->save();

        $id = Crypt::encrypt($id);
        
        return redirect()->route('jocs.show', ['joc' => $id]);        
    }
}