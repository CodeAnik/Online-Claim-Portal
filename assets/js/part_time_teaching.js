function addFields(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    console.log(number);
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("main_table");
    // Clear previous contents of the container
    // while (container.hasChildNodes()) {
    //     container.removeChild(container.lastChild);
    // }
    
    // for (i=0;i<number;i++){
    //     // Append a node with a random text
    //     container.appendChild(document.createTextNode("Member " + (i+1)));
    //     // Create an <input> element, set its type and name attributes
    //     var input = document.createElement("input");
    //     input.type = "text";
    //     input.name = "member" + i;
    //     container.appendChild(input);
    //     // Append a line break 
    //     container.appendChild(document.createElement("br"));
 
    // }

    document.getElementById('main_table').innerHTML = parseHtml(number);
    console.log(number);
}



function parseHtml(number)
{
    var html='<form method="POST" class="container card">'+
'        <div class="row">'+
'            <div class="col-md-6">'+
'                <label for="name">Name:</label>'+
'                <input type="text" id="name" name="name">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="schoolof"> School Of:</label>'+
'                <input type="text" id="schoolof" name="schoolof">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="month">Month:</label>'+
'                <input type="text" id="month" name="month">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="department"> Department:</label>'+
'                <input type="text" id="department" name="department">'+
'            </div>'+
'        </div>'+
'    <table class="table table-striped">'+
'        <thead>'+
'            <tr class="row">'+
'                <th class="col-md-3">Date</th>'+
'                <th class="col-md-3">Subject</th>'+
'                <th class="col-md-3">Hours(Lecture & Tutorial)</th>'+
     //           <th class="col-md-3">Varified By HOD</th>'+
'            </tr>'+
'        </thead>'+
'        <tbody>';

for (i=0;i<number;i++){

        html+='<tr class="row">'+
        '          <td class="col-md-3"><input type="date" name="my_date-'+(i)+'"class="form-control" required></td>'+
        '          <td class="col-md-3"><input type="text" name="subject-'+(i)+'"class="form-control" required></td>'+
        '          <td class="col-md-3">'+
                    '<div class="row">'+
                        '<div class="col-6"><input type="number" name="hours-'+(i)+'"class="form-control" required></div>'+
                        '<div class="col-6">'+
                              '<select id="inputState" name="lecture_type-'+(i)+'" class="form-control">'+
                                '<option value="0">Lecture</option>'+
                                '<option value="1">Tutorial</option>'+
                              '</select>'+
                        '</div>'+
                    '</div>'+
                    '</td>'+
        '        </tr>';
}

html+='        </tbody>'+
'    </table>'+
'            <div style="font-size:15px">'+
'            <b>Rates of Payment</b>'+
'            <div class="col-md-6">'+
'                <label for="Lecture">Lecture  RM: (Per Hour) </label>'+
'                <input style="width: 16%;font-size:22px;" type="number" id="pricerate" name="lecture_rate">'+
'            </div>'+
'            <div class="col-md-6">'+
'               <label for="Lecture">Tutorial  RM: (Per Hour) </label>'+
'               <input style="width:16%;font-size:22px;" type="number" id="pricerate" name="tutorial_rate">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label>Traveling Reimbursement Days</label>'+
'                <input style="width:16%" type="number" id="traveling" name="traveling_days">'+
'            </div>'+
'            <div>'+
'                <label for="signature">Signature</label>'+
'                <input type="text" id="signature" name="signature">'+
'                <label for="date"> Date</label>'+
'                <input type="date" id="date" name="cur_date">'+
'            </div>'+
'            </br></br>'+
'            <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">'+
'              <h2>PART-II</h2>'+
'            </div>'+
'            <div >'+
'              <div class="leftbox">'+
'                Recommended / Not Recommended </br>'+
'              <input type="text" id="signature" name="signature_hod">'+
'              <p>Head of Department</p>'+
'              </div>'+
'              <div class="rightbox">'+
'                Appreved / Not Approved</br>'+
'                <input type="text" id="signature" name="signature_dean">'+
'                <p>Dean of School</p>'+
'              </div>'+
'            </div><br></br></br><br></br></br><br></br></br>'+
'            <div class="text-block">'+
'                <p>1. Please attach Student Attendance Sheet with this claim; Claims must be verified and approved by the Deeportment. </p>'+
'                <p>2. All claims must be submitted to the respective Admit; Assistants/Officers in the School by end of the month.</p>'+
'                <p>3. School Admin Assistants/Officers would need to submit the claims to '+
'HR deportment before/on 5th of the following month to be able to process the'+
'claim in the some month. (e.g. Claims for the month of January must be submitted to HR department by'+
'Ch February in order to process the payment in February)</p>'+
'                <p>4- Claims submitted after 5th of the month will be processed in the following month.</p>'+
'            </div>'+
'          </div>'+
'<input type="text" id="total_object" name="total_object" value="'+(number)+'" style="display:none;">'+
'        <div style="display: flex; justify-content: center;; padding-bottom:10px;">'+



'<button type="button" class="" data-toggle="modal" data-target="#exampleModal">'+
'  Submit'+
'</button>'+
'<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
'  <div class="modal-dialog" role="document">'+
'    <div class="modal-content">'+
'      <div class="modal-header">'+
'        <h5 class="modal-title" id="exampleModalLabel">Are You Confirm</h5>'+
'        <button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
'          <span aria-hidden="true">&times;</span>'+
'        </button>'+
'      </div>'+
'      <div class="modal-body">'+
'        Are You sure to submit ?'+
'      </div>'+
'      <div class="modal-footer">'+
'        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
'        <button type="submit" name="submit_form" class="btn btn-primary">YES</button>'+
'      </div>'+
'    </div>'+
'  </div>'+
'</div>'+

'            <a href="../index.php"><button type="button" class="button">Cancel</button></a>'+
'        </div>'+
'</form>';




    return html;
}