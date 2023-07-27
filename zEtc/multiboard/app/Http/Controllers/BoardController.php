<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $req) {
        $bid = '1';
        $bname = '';
        if($req->bid) {
            $bid = $req->bid;
        }

        switch ($bid) {
            case '1':
                $bname = '자유';
                break;
            
            case '2':
                $bname = '공략';
                break;
        
            case '3':
                $bname = '정보';
                break;
        }

        $result = Board::where('bid', $bid)->get();
        $response = [
            'bname' => $bname,
            'list' => $result->all()
        ];
        return view('index')->with('data', $response);
    }
}
