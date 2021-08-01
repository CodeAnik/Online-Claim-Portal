function add_rows(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    console.log(number);
    var container = document.getElementById("main_table");

   document.getElementById('main_table').innerHTML = parseHtml(number);
 
}


function parseHtml(number)
{
		var html='        <form method="POST" class="container card">'+
		''+
		'                <div class="row">'+
		'                '+
		'                    <div class="col-md-6">'+
		'                        <label for="name">Name:</label>'+
		'                        <input type="text" class="form-control" id="name" name="name">'+
		'                    </div>'+
		'                    <div class="col-md-6">'+
		'                        <label for="school"> School</label>'+
		'                        <input type="text" class="form-control" id="school" name="school">'+
		'                    </div>'+
		'                    <div class="col-md-6">'+
		'                        <label for="emp_no">Emp No:</label>'+
		'                        <input type="text" class="form-control" id="emp_no" name="emp_no">'+
		'                    </div>'+
		'                    <div class="col-md-6">'+
		'                        <label for="department"> Department:</label>'+
		'                        <input type="text" class="form-control" id="department" name="department">'+
		'                    </div>'+
		'                    <div class="col-md-6">'+
		'                        <label for="status"> Status</label>'+
		'                        <input type="text" class="form-control" id="status" name="status" placeholder="partime/fulltime">'+
		'                    </div>                    '+
		'                    <div class="col-md-6">'+
		'                        <label for="month"> Month</label>'+
		'                        <input type="text" class="form-control" id="month" name="month">'+
		'                    </div>'+
		'                </div>'+
		''+
		'            <table class="table table-striped">'+
		''+
		'                <thead>'+
		'                    <tr class="">'+
		'                        <th rowspan="2" >Semester</th>'+
		'                        <th rowspan="2">Subject</th>'+
		'                        <th rowspan="2" >Duration of question</th>'+
		//'                        <th colspan="2" >Marked answer script/Question Paper set</th>'+
		'                    </tr>'+
		'                    <tr>'+
		'                        <th>Marked answer script/Question Paper set</th>'+
		'                        <th>Select Type</th>'+
		'                    </tr>'+
		'                </thead>'+
		'                <tbody>';
			for(var i=0;i<number;++i)
			{
				html+='                <tr class="">'+
				'                  <td ><input type="text" name="semester-'+(i)+'"class="form-control" required></td>'+
				'                  <td ><input type="text" name="subject-'+(i)+'"class="form-control" required></td>'+
				'                  <td ><input type="text" name="question_duration-'+(i)+'"class="form-control" required></td>'+
				'                  <td> <input type="number" name="answer_script_or_question_paper-'+(i)+'"class="form-control" required></td>'+
				'                  <td >'+
				'                      <select id="inputState" name="answer_script_or_question_paper_type-'+(i)+'" class="form-control">'+
				'                        <option value="0">Answer Script</option>'+
				'                        <option value="1">Question set</option>'+
				'                      </select>'+
				'                  </td>'+
				''+
				'                </tr>';
			}
		html+='                </tbody>'+
		'            </table>'+
		''+
		' '+
		'                <div class="row my-4">'+
		'                    <h3 class="col-12 text-center">(i) Marking of Answer Scripts </h3>'+
		''+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                         (a) 2.0-hour paper: RM 6.00 per scripts X <input type="number"  name="two_hour_script"> Per Hour'+
		'                    </div>'+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                         (b) 2.5-hour paper: RM 7.00 per scripts X<input type="number"  name="two_and_half_hour_script" > Per Hour'+
		'                    </div>'+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                         (c) 3.0-hour paper: RM 8.00 per scripts X  <input type="number"  name="three_hour_script" > Per Hour'+
		'                    </div>'+
		'					<div class="col-md-8 offset-md-2 mt-2">        '+
		'                         SUB TOTAL = <input type="number"  name="sub_total" > <small><i>not required to fill up</i></small> '+
		'                   </div>'+
		''+
		'                </div>'+
		''+
		'                <div class="row my-3">'+
		'                    <h3 class="col-12 text-center">(ii) Setting Examination Question Papers </h3>'+
		''+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                        (a) 2.0-hour paper: RM 75.00 per Paper X <input type="number"  name="two_hour_paper" > Per Hour'+
		'                    </div>'+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                        (b) 2.5-hour paper: RM 85.00 per Paper X<input type="number"  name="two_and_half_hour_paper" > Per Hour'+
		'                    </div>'+
		'                    <div class="col-md-8 offset-md-2 mt-2">        '+
		'                         (c) 3.0-hour paper: RM 100.00 per Paper X  <input type="number"  name="three_hour_paper" > Per Hour'+
		'                    </div>'+
		'					<div class="col-md-8 offset-md-2 mt-2">        '+
		'                         SUB TOTAL = <input type="number"  name="sub_total" > <small><i>not required to fill up</i></small> '+
		'                   </div>'+
		'					<div class="col-md-8 offset-md-2 mt-2">        '+
		'                         Grand TOTAL = <input type="number"  name="grand_total" > <small><i>not required to fill up</i></small> '+
		'                   </div>'+
		''+
		'                </div> '+
		''+
		'                <div class="row">'+
		// '                    <div class="col-md-6">'+
		// '                        <label for="signature">Signature:</label>'+
		// '                        <input type="text" class="form-control" id="signature" name="signature">'+
		// '                    </div>'+
		'                    <div class="col-md-6">'+
		'                        <label for="signature_date">Date:</label>'+
		'                        <input type="date" class="form-control" id="signature_date" name="signature_date">'+
		'                    </div>'+
		'                </div>'+
		'				 </br></br>'+
		'                <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">'+
		'                  <h2>PART-II</h2>'+
		'                </div>'+
		''+
		'                <div class="row my-3">'+
		'                    <div class="col-md-4">'+
		'                        Verified By</br>'+
		'                        <input type="text" id="signature" name="signature_hod_or_cordinator">'+
		'                        <p>Head of Department / Program Cordinator</p>'+
		'                    </div>'+
		'                    <div class="col-md-4">'+
		'                        Recommended / Not Recommended by</br>'+
		'                        <input type="text" id="signature" name="signature_dean_school">'+
		'                        <p>Dean of School</p>                      '+
		'                    </div>'+
		'                    <div class="col-md-4">'+
		'                        Varified by</br>'+
		'                        <input type="text" id="signature" name="signature_head_exam_unit">'+
		'                        <p>Head of Exam unit</p>                       '+
		'                    </div>'+
		'                </div>'+
		''+
		'                    <div class="text-block">'+
		'                        <p>1. Please attach Student Attendance Sheet with this claim; Claims must be verified and approved by the Head of Deportment. </p>'+
		'                        <p>2. All claims must be submitted to the respective Admit; Assistants/Officers in the School by end of the month.</p>'+
		'                        <p>3. School Admin Assistants/Officers would need to submit the claims to HR deportment before/on 5th of the following month to be able to process the claim in the some month. (e.g. Claims for the month of January must be submitted to HR department by Ch February in order to process the payment in February)</p>'+
		'                        <p>4- Claims submitted after 5th of the month will be processed in the following month.</p>'+
		'                    </div>'+
		'                  </div>'+
		'<input type="text" id="total_object" name="total_object" value="'+(number)+'" style="display:none;">'+
		''+
		'                <div style="display: flex; justify-content: center;; padding-bottom:10px;">'+
		''+
		'                <button type="button" class="" data-toggle="modal" data-target="#exampleModal">'+
		'                 Submit'+
		'                </button>'+
		'                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
		'                  <div class="modal-dialog" role="document">'+
		'                    <div class="modal-content">'+
		'                      <div class="modal-header">'+
		'                        <h5 class="modal-title" id="exampleModalLabel">Are You Confirm</h5>'+
		'                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
		'                          <span aria-hidden="true">&times;</span>'+
		'                        </button>'+
		'                      </div>'+
		'                      <div class="modal-body">'+
		'                        Are You sure to submit ?'+
		'                      </div>'+
		'                      <div class="modal-footer">'+
		'                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
		'                        <button type="submit" name="submit_form" class="btn btn-primary">YES</button>'+
		'                      </div>'+
		'                    </div>'+
		'                  </div>'+
		'                </div>'+
		'                    <a href="../index.php"><button type="button" class="button">Cancel</button></a>'+
		'                </div>'+
		'        </form>    ';
		return html;

}
