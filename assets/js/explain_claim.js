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
	'                        <label for="staff_no">Staff No:</label>'+
	'                        <input type="text" class="form-control" id="staff_no" name="staff_no">'+
	'                    </div>'+
	'                    <div class="col-md-6">'+
	'                        <label for="department"> Department:</label>'+
	'                        <input type="text" class="form-control" id="department" name="department">'+
	'                    </div>                 '+
	'                    <div class="col-md-6">'+
	'                        <label for="month"> Month</label>'+
	'                        <input type="text" class="form-control" id="month" name="month">'+
	'                    </div>'+
	'                </div>'+
	''+
	'            <table class="table table-striped">'+
	'                <h3 class="text-center mt-2">Part:A General Claim</h3>'+
	'                <thead>'+
	'                    <tr class="">'+
	'                        <th rowspan="2" >Date</th>'+
	'                        <th rowspan="2">Description</th>'+
	'                        <th rowspan="2" >Remarks</th>'+
	'                        <th class="text-center" colspan="2" >Amount RM</th>'+
	'                    </tr>'+
	' '+
	'                </thead>'+
	'                <tbody>';

			for(var i=0;i<number;++i)
			{
					html+='                <tr class="">'+
					'                  <td ><input type="date" name="my_date-'+(i)+'" class="form-control" required></td>'+
					'                  <td ><input type="text" name="description-'+(i)+'"class="form-control" required></td>'+
					'                  <td ><input type="text" name="remarks-'+(i)+'"class="form-control" required></td>'+
					'                  <td> <input type="number" name="amount_1-'+(i)+'"class="form-control" required></td>'+
					'                  <td> <input type="number" name="amount_2-'+(i)+'"class="form-control" required></td>'+
					'                </tr>';
			}

	html+='                </tbody>'+
	'            </table>'+
	''+
	'            <table class="table table-striped">'+
	'                <h3 class="text-center mt-2">Part:B Claims For Mikeage/Outstation Travel</h3>'+
	'                <thead>'+
	'                    <tr class="">'+
	'                        <th rowspan="2">Destination and purpose trip</th>'+
	'                        <th rowspan="2" >No of KM</th>'+
	'                        <th rowspan="2" >Parjs Toll RM</th>'+
	'                        <th rowspan="2" >Account RM</th>'+
	'                        <th rowspan="2" >Misc RM</th>'+
	'                        <th class="text-center" colspan="3" >Allowance (RM)</th>'+
	'                        <th class="text-center" colspan="2" >Amount (RM)</th>'+
	'                    </tr>'+
	'                    <tr>'+
	'                        <th>B Fast</th>'+
	'                        <th>Lunch</th>'+
	'                        <th>Dinner</th>'+
	'                    </tr>'+
	' '+
	'                </thead>'+
	'                <tbody>';

			for(var i=0;i<number;++i)
			{

				html+='                <tr class="">'+
				'                    <td ><input class="b_input" type="text" name="destination_and_purpose-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="text" name="no_of_km-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="text" name="parj_and_toll-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="text" name="account_rm-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="text" name="misc_rm-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="number" name="b_fast-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="number" name="lunch-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="number" name="dinner-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="number" name="amount_rm_1-'+(i)+'" required></td>'+
				'                    <td ><input class="b_input" type="number" name="amount_rm_2-'+(i)+'" required></td>'+
				'                </tr>';
			}

	html+='                </tbody>'+
	'            </table>'+
	''+
	''+
	' '+
	'                <div class="row">'+
	'                '+
	'                    <div class="col-md-6">'+
	'                        First 500km ='+
	'                        <input type="text"  id="first_500" name="first_500">'+
	'                        X RM 0.60'+
	'                    </div>'+
	'                    <div class="col-md-6">'+
	'                        Thereafter ='+
	'                        <input type="text"  id="there_after" name="there_after">'+
	'                        X RM 0.50'+
	'                    </div>'+
	' '+
	'                </div>'+
	'				 </br><br>'+
	'                <table class="table table-striped mt-4">'+
	'                  <tbody>'+
	'                    <tr>'+
	'                      <td> <h2> Staff Declaration:</h2>'+
	'                        I declare that all the expenses were necessarily incurred on behalf of the company and are in compliance ith all appicable policies and guidlines.</td>'+
	'                      <td> <h2>Manager/Head of Department Declaration:</h2>'+
	'                        I have reviewed the details of the above expense claim and I am satisfied that these expenses were properly incurred on behalf of the company and are in compliance with all applicable policies and guidelines.</td>'+
	'                      <td class="">For Finance only:</td>'+
	'                    </tr>'+
	'                    <tr>'+
	'                    <td>                       '+
	'                       <label for="name">Staff Signature:</label>'+
	'                        <input type="text" class="form-control" id="staff_signature" name="staff_signature">'+
	'                    </td>'+
	'                    <td>                      '+
	'                        <label for="name">Signature:</label>'+
	'                        <input type="text" class="form-control" id="signature" name="signature"></td>'+
	'                    <td> Checked by:</td>'+
	'                    </tr>'+
	'                  </tbody>'+
	'                </table>                '+
	''+
	'                    <div class="text-block">'+
	'                        <p>1. All claims (with the exception of Note 3) to be submitted to Finance department on & calendar month basis Cut off date for submission 1st by the 7th of following month.</p>'+
	'                        <p>2. Claims must be supported with relevant documentations, failing which the management may reject the claims. For example Travelling claims should be supported by travel request form, toll, parking receipts, etc (where applicable) Original receipts, where applicable, must be attached</p>'+
	'                        <p>3. For medical and dental claims, please fill in a separate form and submit to Human Resources Department separately.</p>'+
	'                    </div>'+
	'                  </div>'+
	''+
	'                <div style="display: flex; justify-content: center;; padding-bottom:10px;">'+
	'<input type="text" id="total_object" name="total_object" value="'+(number)+'" style="display:none;">'+
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
	'        </form>   ';


	return html;

}