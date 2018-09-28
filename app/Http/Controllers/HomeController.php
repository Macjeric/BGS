<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\User;
use App\Models\ApprovalsModel;
use App\Models\BudgetModel;
use App\Models\RemarksModel;
use App\Models\BalanceModel;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $balance1 = DB::table('balance')->join('budget', 'balance.budget_id', '=' , 'budget.budget_id')->where('budget.user_id', Auth::user()->id)->select('*')->orderBy('budget.updated_at', 'desc')->count();
if($balance<1)


        return view('home', compact('balance'));
    }

    public function add()
    {

        $balance1 = DB::table('balance')->join('budget', 'balance.budget_id', '=' , 'budget.budget_id')->where('budget.user_id', Auth::user()->id)->select('*')->orderBy('budget.updated_at', 'desc')->count();
    if($balance<1)

        $branch_details = DB::table('branches')->where('branch_id', Auth::user()->branch_id_)->get();
        $reviewer_list = DB::table('users')->where( 'title','=','HFA' )->orWhere('title','=','PFA')->get();

        return view('add', compact('branch_details','reviewer_list','balance'));
    }

    public function add_post()
    {

    $balance1 = DB::table('balance')->join('budget', 'balance.budget_id', '=' , 'budget.budget_id')->where('budget.user_id', Auth::user()->id)->select('*')->orderBy('budget.updated_at', 'desc')->count();
if($balance<1)


    DB::table('budget')->insert( array(

            'user_id' => Auth::u65tfser()->id,
            'month' => Input::get('month'),
            'market_cost' => Input::get('market_cost'),
            'travelling_cost' => Input::get('travelling_cost'),
            'fuel_cost' => Input::get('fuel_cost'),
            'postage_cost' => Input::get('postage_cost'),
            'fax_cost' => Input::get('fax_cost'),
            'budget_status' => 'created',
            'business_status' => 'Not settled',
            'description' => Input::get('output_description'),
            'expected_premium' => Input::get('expected_premium'),
            'carry_over_balance' => $balance,
            'first_approval' => Input::get('reviewer'),
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  Carbon::now()
        ));

    $created_id = DB::getPdo()->lastInsertId();

    DB::table('approvals')->insert( array(

            'budget_id' => $created_id,
            'category' => 'Reviewed by:',
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  NULL,
        ));

    DB::table('approvals')->insert( array(

            'budget_id' => $created_id,
            'category' => 'Recommended for budget by:',
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  NULL,
        ));

    DB::table('approvals')->insert( array(

            'budget_id' => $created_id,
            'category' => 'Recommended for activity by:',
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  NULL,
        ));

    DB::table('approvals')->insert( array(

            'budget_id' => $created_id,
            'category' => 'Approved by:',
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  NULL,
        ));

$total =  Input::get('market_cost')+Input::get('travelling_cost')+Input::get('fuel_cost')+Input::get('postage_cost')+Input::get('fax_cost');

    DB::table('balance')->insert( array(

            'budget_id' => $created_id,
            'total_cost' => $total,
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  Carbon::now(),
        ));



    return redirect('/requests')->with('success', 'Budget Submitted Successfully!');

    }

    public function approve($id)
    {
        $reviewer_list_1 = DB::table('users')->where( 'title','=','HFA' )->get();
        $reviewer_list_2 = DB::table('users')->where( 'title','=','DGM' )->orWhere('title','=','PFA')->get();
        $reviewer_list_3 = DB::table('users')->where( 'title','=','GM' )->orWhere('title','=','HFA')->get();
        $reviewer_list_4 = DB::table('users')->where( 'title','=','DGM' )->get();

        $show_budget_details = DB::table('budget')->where('budget_id', $id )->first();
        $show_reviewer = DB::table('approvals')->join('users', 'users.id', '=', 'approvals.approving_user_id')->where('budget_id', $id )->select('*')->get();


        $name = DB::table('users')->where('id', $show_budget_details->user_id )->first();
       
        $branch = DB::table('branches')->where('branch_id', $name->branch_id_ )->first();
        $total = DB::table('balance')->where('budget_id', $id )->first();



        return view('approve', compact('show_budget_details','show_reviewer','show_status','total','name','branch','reviewer_list_1', 'reviewer_list_2', 'reviewer_list_3','reviewer_list_4'));
    }

    public function approve_post($id)
    {

        if(Auth::user()->title == 'PFA'){
        $approve = ApprovalsModel::where('category','=','Reviewed by:')->where('budget_id',$id)->first();
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Approved';
        $approve->comment = Input::get('comment');
        $approve->forward_to = Input::get('reviewer');
        $approve->save();
        return redirect('approved')->with('success','Budget approved Successfully!');
        }

        elseif(Auth::user()->title == 'HFA'){
        $approve = ApprovalsModel::where('category','=','Recommended for budget by:')->where('budget_id',$id)->first();
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Approved';
        $approve->comment = Input::get('comment');
        $approve->forward_to = Input::get('reviewer');
        $approve->save();
        return redirect('approved')->with('success','Budget approved Successfully!');
        }

        elseif(Auth::user()->title == 'DGM'){
        $approve = ApprovalsModel::where('category','=','Recommended for activity by:')->where('budget_id',$id)->first();
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Approved';
        $approve->comment = Input::get('comment');
        $approve->forward_to = Input::get('reviewer');
        $approve->save();
        return redirect('approved')->with('success','Budget approved Successfully!');
        }

        elseif(Auth::user()->title == 'GM'){
        
        $approve = ApprovalsModel::where('category','=','Approved by:')->where('budget_id',$id)->first();
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Approved';
        $approve->comment = Input::get('comment');
        $approve->forward_to = Input::get('reviewer');
        $approve->save();

        $approve = BudgetModel::where('budget_id', $id)->first();
        $approve->budget_status = 'Approved';
        $approve->save();


        return redirect('approved')->with('success','Budget approved Successfully!');


        }
    else{

        return redirect('approved')->with('failure','Sorry You Are Not Authorized to Perform This Operation');
    }

    }

/*
    public function reject_post($id)
    {
        if(Auth::user()->title == 'PFA'){
        $approve = Approvals::where('category','=','Reviewed by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Rejected';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Rejected Successfully!');
        }

        elseif(Auth::user()->title == 'HFA'){
        $approve = Approvals::where('category','=','Recommended for budget by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Rejected';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Rejected Successfully!');
        }

        elseif(Auth::user()->title == 'DGM'){
        $approve = Approvals::where('category','=','Recommended for activity by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Rejected';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Rejected Successfully!');
        }

        elseif(Auth::user()->title == 'GM'){
        $approve = Approvals::where('category','=','Approved by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Rejected';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Rejected Successfully!');
        }
    else{

        return redirect('approved')->with('failure','Sorry You Are Not Authorized to Perform This Operation');
    }

    }

    public function return_post($id)
    {
        if(Auth::user()->title == 'PFA'){
        $approve = Approvals::where('category','=','Reviewed by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Returned';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Returned Successfully!');
        }

        elseif(Auth::user()->title == 'HFA'){
        $approve = Approvals::where('category','=','Recommended for budget by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Returned';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Returned Successfully!');
        }

        elseif(Auth::user()->title == 'DGM'){
        $approve = Approvals::where('category','=','Recommended for activity by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Returned';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Returned Successfully!');
        }

        elseif(Auth::user()->title == 'GM'){
        $approve = Approvals::where('category','=','Approved by:')->find($id);
        $approve->approving_user_id = Auth::user()->id;
        $approve->status = 'Returned';
        $approve->comment = Input::get('comment');
        $approve->save();
        return redirect('approved')->with('success','Budget Returned Successfully!');
        }
    else{

        return redirect('approved')->with('failure','Sorry You Are Not Authorized to Perform This Operation');
    }

    }  
*/
    public function requests()
    {
        $list_requests = DB::table('budget')->where('user_id', Auth::user()->id)->get();

        return view('requests', compact('list_requests'));
    }

    public function reports()
    {
        return view('report');
    }

    public function follow($id)
    {
        $show_budget_details = DB::table('budget')->where('budget_id', $id )->get();
        
        $show_reviewer = DB::table('approvals')->join('users', 'users.id', '=', 'approvals.approving_user_id')->where('budget_id', $id )->select('*')->get();
       
        $show_status = DB::table('approvals')->where('budget_id', $id )->where('category','=','Approved by:')->where('status','=','Approved')->count();
        $total = DB::table('balance')->where('budget_id', $id )->first();

        $remarks_details = DB::table('remarks')->where('budget_id', $id )->first();
        $remarks_details_count = DB::table('remarks')->where('budget_id', $id )->count();

        $budget_id = $id;
     
        $branch = DB::table('branches')->where('branch_id', Auth::user()->branch_id_ )->first();
        return view('follow', compact('show_budget_details','show_reviewer','show_status','total','branch','budget_id','remarks_details','remarks_details_count'));
    }

    public function edit_budget($id)
    {
        $branch_details = DB::table('branches')->where('branch_id', Auth::user()->branch_id_)->get();
        $budget_details = DB::table('budget')->where('budget_id', $id )->first();

        return view('edit_budget', compact('budget_details','branch_details'));
    }

    public function remarks_post(Request $request, $id)
    {
          $this->validate($request, [
            'remarks' => 'required|max:255',
            'action_date' => 'required|max:255',
            'actual_cost' => 'required|numeric',

         ]);


        $balance = DB::table('balance')->where('budget_id', $id )->first();

        if(Input::get('actual_cost')>$balance->total_cost){

        return redirect()->back()->with('failure','Sorry, the Actual cost cannot be greater than the Total Cost');

        }

        DB::table('remarks')->insert( array(

            'budget_id' =>  $id,
            'actual_cost' => Input::get('actual_cost'),
            'expected_action_date' => Input::get('action_date'),
            'remarks' => Input::get('remarks'),
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  Carbon::now(),
        ));

        $resultant = $balance->total_cost-Input::get('actual_cost');

        $balance = BalanceModel::where('budget_id',$id)->first();
        $balance->actual_cost = Input::get('actual_cost');
        $balance->resultant_balance = $resultant;
        $balance->save();

        return redirect()->back()->with('success','Congratulations! Remark Submitted Successfully!');
    }

    public function settle($id)
    {
        $balance = DB::table('balance')->where('budget_id', $id )->first();
        $reviewer_list = DB::table('users')->where( 'title','=','HFA' )->orWhere('title','=','PFA')->get();   
        
        return view('settle', compact('balance','reviewer_list'));
    }

    public function settle_post($id)
    {
    

        $balance = RemarksModel::where('budget_id', $id)->first();
        $balance->final_remarks = Input::get('final_remarks');
        $balance->reviewer = Input::get('reviewer');
        $balance->status = 'Business Settled';
        $balance->save();

        $approve = BudgetModel::where('budget_id', $id)->first();
        $approve->business_status = 'Settled';
        $approve->save();

       return redirect('/requests')->with('success','Congratulations, Business Settled');

    }

    public function update_budget($id)
    {


        $budget = BudgetModel::where('budget_id',$id)->first();
        $budget->month = Input::get('month');
        $budget->market_cost = Input::get('market_cost');
        $budget->travelling_cost = Input::get('travelling_cost');
        $budget->fuel_cost = Input::get('fuel_cost');
        $budget->postage_cost = Input::get('postage_cost');
        $budget->fax_cost = Input::get('fax_cost');
        $budget->description =Input::get('output_description');
        $budget->expected_premium = Input::get('expected_premium');
        $budget->budget_status = 'created *';
        $budget->save();

    $budget = DB::table('budget')->where('budget_id', $id )->first();

    
    $total = $budget->market_cost+$budget->travelling_cost+$budget->fuel_cost+$budget->postage_cost+$budget->fax_cost;

        $balance = BalanceModel::where('budget_id',$id)->first();
        $balance->total_cost = $total;
        $balance->save();



    return redirect('requests')->with('success','Request Updated Successfully!');

    }



}

