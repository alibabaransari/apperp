<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Account;
use Illuminate\Http\Request;
use Auth;
use DB;
class ChartOfAccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
		$accounts = new Account;
		$accounts = $accounts->where('status',1)->orderBy('level1', 'ASC')
			->orderBy('level2', 'ASC')
			->orderBy('level3', 'ASC')
			->orderBy('level4', 'ASC')
			->orderBy('level5', 'ASC')
			->orderBy('level6', 'ASC')
			->orderBy('level7', 'ASC')
			->get();

		return view('chart.index',compact('accounts'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = new Account;
		$accounts = $accounts::orderBy('level1', 'ASC')
    				->orderBy('level2', 'ASC')
					->orderBy('level3', 'ASC')
					->orderBy('level4', 'ASC')
					->orderBy('level5', 'ASC')
					->orderBy('level6', 'ASC')
					->orderBy('level7', 'ASC')
			->where('status',1)
    				->get();
   		return view('chart.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

		try {

			
		$parent_code = $request->account_id;
		$acc_name = $request->acc_name;
		$o_blnc = $request->o_blnc;
		$o_blnc_trans =$request->o_blnc_trans;
		$operational = $request->operational;
		$sent_code = $parent_code;


		$max_id = DB::selectOne('SELECT max(`id`) as id  FROM `accounts` WHERE `parent_code` LIKE \''.$parent_code.'\' and status=1')->id;
		if($max_id == '')
		{
			$code = $sent_code.'-1';
		}
		else
		{
			$max_code2 = DB::selectOne('SELECT `code`  FROM `accounts` WHERE `id` LIKE \''.$max_id.'\' and status=1')->code;
			$max_code2;
			$max = explode('-',$max_code2);
			$code = $sent_code.'-'.(end($max)+1);
		}

		$level_array = explode('-',$code);
		$counter = 1;
		foreach($level_array as $level):
			$data1['level'.$counter] = $level;
			$counter++;
		endforeach;
		$data1['code'] = $code;
		$data1['name'] = $acc_name;
		$data1['parent_code'] = $parent_code;
		$data1['username'] 		 	= Auth::user()->name;

		$data1['date']     		  = date("Y-m-d");
		$data1['time']     		  = date("H:i:s");
		$data1['action']     		  = 'create';
		$data1['operational']		= $operational;
		$acc_id = DB::table('accounts')->insertGetId($data1);

		$data2['acc_id'] =	$acc_id;
		$data2['acc_code']=	$code;
		$data2['debit_credit']=	$o_blnc_trans;
		$data2['amount'] 	  = 	$o_blnc;
		$data2['opening_bal'] 	  = 	1;
		$data2['username'] 		 	= Auth::user()->name;

		$data2['date']     		  = date("Y-m-d");
		$data2['v_date']     		= date("Y-m-d");
		$data2['time']     		  = date("H:i:s");
		$data2['action']     		  = 'create';
		DB::table('transactions')->insert($data2);
		DB::commit();
		}
		catch(\Exception $e)
		{
			DB::rollback();
			echo "EROOR"; //die();
			dd($e->getMessage());

		}

		return redirect()->route('account-create');
    }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function opening()
    {
        $AccountsData = DB::select('select * from accounts where status = 1 and parent_code LIKE "1%" OR code LIKE  "2%" OR code = 1 OR code = 2 order by `level1`,`level2`,`level3`,`level4`,`level5`,`level6`,`level7`');
	 
        return view('chart.chartopening',compact('AccountsData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseStudy $caseStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseStudy $caseStudy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseStudy $caseStudy)
    {
        //
    }

	function insertOpeningBalance(Request $request)
    {
        DB::beginTransaction();

        try {


            $acc_id=$request->Account_Id;
            $nature=$request->nature;
            $amount=$request->amount;
            $AccYearFrom='2021-01-02';
            $AccYearTo='2024-10-02';

            $data['debit_credit']=$nature;

            $data['amount']=$amount;


            //$count=$this->db->query('select acc_id from transactions where acc_id="'.$acc_id.'" and opening_bal=1')->num_rows();
            $count = DB::table('transactions')->where('acc_id',$acc_id)->where('opening_bal',1);

            if ($count->count() > 0):
//            $this->db->where('acc_id',$acc_id);
//            $this->db->where('opening_bal',1);
//            $this->db->update('transactions',$data);
            DB::table('transactions')->where('acc_id',$acc_id)->where('opening_bal',1)->update($data);
                else:
                    $AccCode = DB::table('accounts')->where('id',$acc_id)->select('code')->first();
                    $data['debit_credit']=$nature;
                    $data['amount']=$amount;
                    $data['v_date']=$AccYearFrom;
                    $data['opening_bal']=1;
                    $data['username'] = Auth::user()->name;
                    $data['date']=date('Y-m-d');
                    $data['status']=1;
                    $data['acc_id']=$acc_id;
                    $data['debit_credit']=$nature;
                    $data['acc_code']= $AccCode->code;
                    $data['action']= 'Opening';
                    //$this->db->insert('transactions',$data);
                    DB::table('transactions')->insert($data);

                endif;
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            echo "EROOR"; //die();
            dd($e->getMessage());

        }
    }
}
