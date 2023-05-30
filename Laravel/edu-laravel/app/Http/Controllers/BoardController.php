<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // -------------
        // 쿼리 빌더
        // -------------
        // select
        $result = DB::select('select * from categories');

        $no = '5';
        $result = DB::select(
            'select * from categories where no = :no'
            , ['no' => $no]
        );

        $input = ['4', '7', '8']; // categories의 no 컬럼
        // 게시글 번호, 게시글 제목, 카테고리명을 출력해 주세요. (게시글 번호로 오름차순 정렬 후 상위 5개만)
        $result = DB::select(
            'select b.bno, b.btitle, c.name
                from categories c, boards b 
                where c.no = b.category
                    and c.no in(?, ?, ?)
                order by b.bno
                limit 5', $input);

        $result = DB::select(
            'select b.bno, b.btitle, c.name
            from categories c
                inner join boards b 
                    on c.no = b.category
            where c.no in(?, ?, ?)
            order by b.bno
            limit 5', $input);

        //$result = DB::insert(
        //    'insert into boards(category, btitle, bcontent, created_at, updated_at)
        //    values(:category, :btitle, :bcontent, NOW(), NOW())'
        //    ,[
        //        'category' => '5'
        //        , 'btitle' => '제목'
        //        , 'bcontent' => '내용'
        //    ]
        //);

        // update
        // 방금 등록한 게시글의 제목 : test, 내용 : testtest로 변경해 주세요.
        //$result = DB::update('update boards set btitle = ?, bcontent = ? updated_at = now() where bno = ?'
        //    ,['test', 'testtest', 20]
        //);
        
        // delete
        //$result = DB::delete('delete from boards where bno in( ?, ? )', [19, 20]);


        // ----------
        // 쿼리 빌더 체이닝
        // ----------
        $no = '5';
        // select * from categories where no = ?
        //$result = DB::table('categories')->where('no', '=', $no)->get();

        // select * from categories where no = ? or no = ?
        $no1 = '5';
        $no2 = '8';
        //$result = DB::table('categories')->where('no', $no1)->orWhere('no', $no2)->get();

        // select * from categories where no in (?, ?)
        //$result = DB::table('categories')->whereIn('no', [$no1, $no2])->get();

        // select * from categories where no NOT IN ('5', '8')
        //$result = DB::table('categories')->whereNotIn('no', [$no1, $no2])->dd();

        // select id, no, name from categories
        //$result = DB::table('categories')->select('id', 'no', 'name')->dd();

        // select id, no, name from categories order by name desc
        //$result = DB::table('categories')->select('id', 'no', 'name')->orderBy('name', 'desc')->dd();
        
        // select * from categories where no = ? and no = ?
        //$result = DB::table('categories')->where('no', '=', $no1)->where('no', '=', $no2)->get();

        // *** 주의해서 사용(사용 안하는 걸 추천) *** whereRaw()
        //$result = DB::table('categories')->whereRaw('no = '.$no1);

        // first() : Limit 1과 비슷한 작동, 실패 시 false 리턴
        //$result = DB::table('boards')->orderBy('bno', 'desc')->first();

        // firstOrFail() : first() 같은 동작을 하는데, 실패시 결과가 예외 발생(엘로퀀트 모델 객체에서만 사용 가능)
        //$result = DB::table('boards')->orderBy('bno', 'desc')->firstOrFail();

        // 집계 메소드
        //$result = DB::table('boards')->count(); // 결과의 레코드수를 반환
        //$result = DB::table('boards')->max('bno'); // 해당 컬럼의 최대치를 반환
        
        // 트랜잭션
        //DB::beginTransaction(); // 트랜잭션 시작
        //DB::rollback(); // 롤백
        //DB::commit(); // 커밋


        // 카테고리가 활성화 되어 있는 게시글의 카테고리 별 갯수를 출력해 주세요.
        // 카테고리 번호, 카테고리명, 갯수
        $result = DB::table('categories')
            ->select('categories.no', 'categories.name', DB::raw('count(*) as cnt'))
            ->join('boards', 'categories.no', 'boards.category')
            ->where('categories.active_flg', '1')
            ->groupBy('categories.no', 'categories.name')
            ->get();


            //
        return var_dump($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
