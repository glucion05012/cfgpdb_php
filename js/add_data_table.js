//Children

function cdn_delete_row()
{
 var cdn_table=document.getElementById("cdn_data_table");
 var no =(cdn_table.rows.length)-3;

 document.getElementById("cdn_row"+no+"").outerHTML="";
}

function add_new_cdn()
{

 var new_cdn_fullname=document.getElementById("new_cdn_fullname").value;
 var new_cdn_bday=document.getElementById("new_cdn_bday").value;
 var new_cdn_cstatus=document.getElementById("new_cdn_cstatus").value;
 var new_cdn_contact=document.getElementById("new_cdn_contact").value;
 var new_cdn_email=document.getElementById("new_cdn_email").value;
 var new_cdn_course=document.getElementById("new_cdn_course").value;
 var new_cdn_occupation=document.getElementById("new_cdn_occupation").value;
	
 var cdn_table=document.getElementById("cdn_data_table");
 var cdn_table_len=(cdn_table.rows.length)-2;

 var cdn_row = cdn_table.insertRow(cdn_table_len+1).outerHTML="<tr id='cdn_row"+cdn_table_len+"'><td> <input class='form-control' type='text'  name='cdn_fullname"+cdn_table_len+"' value='"+new_cdn_fullname+"'></td><td> <input class='form-control' type='date'  name='cdn_bday"+cdn_table_len+"' value='"+new_cdn_bday+"'></td><td> <select class='form-control' name='cdn_cstatus"+cdn_table_len+"'><option value='"+new_cdn_cstatus+"'>"+new_cdn_cstatus+"</option><option value='Single'>Single</option><option value='Married'>Married</option><option value='Widow/er'>Widow/er</option><option value='Single Parent'>Single Parent</option><option value='Separated'>Separated</option><option value='Annulled'>Annulled</option></select></td><td> <input class='form-control' type='text'  name='cdn_contact"+cdn_table_len+"' value='"+new_cdn_contact+"'></td><td> <input class='form-control' type='email'  name='cdn_email"+cdn_table_len+"' value='"+new_cdn_email+"'></td><td> <input class='form-control' type='text'  name='cdn_course"+cdn_table_len+"' value='"+new_cdn_course+"'></td><td> <input class='form-control' type='text'  name='cdn_occupation"+cdn_table_len+"' value='"+new_cdn_occupation+"'></td><td></td></tr>";

 document.getElementById("new_cdn_fullname").value="";
 document.getElementById("new_cdn_bday").value="";
 document.getElementById("new_cdn_cstatus").value="Single";
 document.getElementById("new_cdn_contact").value="";
 document.getElementById("new_cdn_email").value="";
 document.getElementById("new_cdn_course").value="";
 document.getElementById("new_cdn_occupation").value="";
}

//Education

function educ_delete_row()
{
 var cdn_table=document.getElementById("educ_data_table");
 var no =(cdn_table.rows.length)-3;

 document.getElementById("educ_row"+no+"").outerHTML="";
}

function add_new_educ()
{

 var new_educ_year=document.getElementById("new_educ_year").value;
 var new_educ_school=document.getElementById("new_educ_school").value;
 var new_educ_level=document.getElementById("new_educ_level").value;
 var new_educ_remarks=document.getElementById("new_educ_remarks").value;
 var new_educ_category=document.getElementById("new_educ_category").value;
	
 var educ_table=document.getElementById("educ_data_table");
 var educ_table_len=(educ_table.rows.length)-2;

 var educ_row = educ_table.insertRow(educ_table_len+1).outerHTML="<tr id='educ_row"+educ_table_len+"'><td> <input class='form-control' type='text'  name='educ_year"+educ_table_len+"' value='"+new_educ_year+"'></td><td> <input class='form-control' type='text'  name='educ_school"+educ_table_len+"' value='"+new_educ_school+"'></td><td> <input class='form-control' type='text'  name='educ_level"+educ_table_len+"' value='"+new_educ_level+"'></td> <td> <input class='form-control' type='text'  name='educ_remarks"+educ_table_len+"' value='"+new_educ_remarks+"'></td><td> <select class='form-control' name='educ_category"+educ_table_len+"'><option value='"+new_educ_category+"'>"+new_educ_category+"</option><option value='Theological'>Theological</option><option value='Secular'>Secular</option></select></td><td></td></tr>";
 
 document.getElementById("new_educ_year").value="";
 document.getElementById("new_educ_school").value="";
 document.getElementById("new_educ_level").value="";
 document.getElementById("new_educ_remarks").value="";
 document.getElementById("new_educ_category").value="Theological";
}

//Work

function work_delete_row()
{
 var cdn_table=document.getElementById("work_data_table");
 var no =(cdn_table.rows.length)-3;

 document.getElementById("work_row"+no+"").outerHTML="";
}

function add_new_work()
{

 var new_work_year=document.getElementById("new_work_year").value;
 var new_work_company=document.getElementById("new_work_company").value;
 var new_work_address=document.getElementById("new_work_address").value;
 var new_work_position=document.getElementById("new_work_position").value;
	
 var work_table=document.getElementById("work_data_table");
 var work_table_len=(work_table.rows.length)-2;

 var work_row = work_table.insertRow(work_table_len+1).outerHTML="<tr id='work_row"+work_table_len+"'><td> <input class='form-control' type='text'  name='work_year"+work_table_len+"' value='"+new_work_year+"'></td><td> <input class='form-control' type='text'  name='work_company"+work_table_len+"' value='"+new_work_company+"'></td><td> <input class='form-control' type='text'  name='work_address"+work_table_len+"' value='"+new_work_address+"'></td> <td> <input class='form-control' type='text'  name='work_position"+work_table_len+"' value='"+new_work_position+"'></td><td></td></tr>";
 
 document.getElementById("new_work_year").value="";
 document.getElementById("new_work_company").value="";
 document.getElementById("new_work_address").value="";
 document.getElementById("new_work_position").value="";
}

//Ministry History

function mty_delete_row()
{
 var cdn_table=document.getElementById("mty_data_table");
 var no =(cdn_table.rows.length)-3;

 document.getElementById("mty_row"+no+"").outerHTML="";
}

function add_new_mty()
{
	
 var new_mty_church=document.getElementById("new_mty_church").value;
 var new_mty_address=document.getElementById("new_mty_address").value;
 var new_mty_year=document.getElementById("new_mty_year").value;
 var new_mty_position=document.getElementById("new_mty_position").value;
 var new_mty_reason=document.getElementById("new_mty_reason").value;
	
 var mty_table=document.getElementById("mty_data_table");
 var mty_table_len=(mty_table.rows.length)-2;

 var mty_row = mty_table.insertRow(mty_table_len+1).outerHTML="<tr id='mty_row"+mty_table_len+"'><td> <input class='form-control' type='text'  name='mty_church"+mty_table_len+"' value='"+new_mty_church+"'></td><td> <input class='form-control' type='text'  name='mty_address"+mty_table_len+"' value='"+new_mty_address+"'></td><td> <input class='form-control' type='text'  name='mty_year"+mty_table_len+"' value='"+new_mty_year+"'></td><td> <input class='form-control' type='text'  name='mty_position"+mty_table_len+"' value='"+new_mty_position+"'></td><td> <input class='form-control' type='text'  name='mty_reason"+mty_table_len+"' value='"+new_mty_reason+"'></td><td></td></tr>";
 
 document.getElementById("new_mty_church").value="";
 document.getElementById("new_mty_address").value="";
 document.getElementById("new_mty_year").value="";
 document.getElementById("new_mty_position").value="";
 document.getElementById("new_mty_reason").value="";
}

//Religious Background

function relb_delete_row()
{
 var cdn_table=document.getElementById("relb_data_table");
 var no =(cdn_table.rows.length)-3;

 document.getElementById("relb_row"+no+"").outerHTML="";
}

function add_new_relb()
{
	
 var new_relb_church=document.getElementById("new_relb_church").value;
 var new_relb_municipality=document.getElementById("new_relb_municipality").value;
 var new_relb_mentoring=document.getElementById("new_relb_mentoring").value;
	
 var relb_table=document.getElementById("relb_data_table");
 var relb_table_len=(relb_table.rows.length)-2;

 var relb_row = relb_table.insertRow(relb_table_len+1).outerHTML="<tr id='relb_row"+relb_table_len+"'><td> <input class='form-control' type='text'  name='relb_church"+relb_table_len+"' value='"+new_relb_church+"'></td><td> <input class='form-control' type='text'  name='relb_municipality"+relb_table_len+"' value='"+new_relb_municipality+"'></td><td> <input class='form-control' type='text'  name='relb_mentoring"+relb_table_len+"' value='"+new_relb_mentoring+"'></td><td></td></tr>";
 
 document.getElementById("new_relb_church").value="";
 document.getElementById("new_relb_municipality").value="";
 document.getElementById("new_relb_mentoring").value="";
}

//Church member children

function ch_mem_cdn_delete_row()
{
 var ch_mem_cdn_table=document.getElementById("ch_mem_cdn_data_table");
 var no =(ch_mem_cdn_table.rows.length)-3;

 document.getElementById("ch_mem_cdn_row"+no+"").outerHTML="";
}

function add_new_ch_mem_cdn()
{
	
 var new_ch_mem_cdn_fullname=document.getElementById("new_ch_mem_cdn_fullname").value;
 var new_ch_mem_cdn_bday=document.getElementById("new_ch_mem_cdn_bday").value;
 var new_ch_mem_cdn_cstatus=document.getElementById("new_ch_mem_cdn_cstatus").value;
	
 var ch_mem_cdn_table=document.getElementById("ch_mem_cdn_data_table");
 var ch_mem_cdn_table_len=(ch_mem_cdn_table.rows.length)-2;

 var ch_mem_cdn_row = ch_mem_cdn_table.insertRow(ch_mem_cdn_table_len+1).outerHTML="<tr id='ch_mem_cdn_row"+ch_mem_cdn_table_len+"'><td> <input class='form-control' type='text'  name='ch_mem_cdn_fullname"+ch_mem_cdn_table_len+"' value='"+new_ch_mem_cdn_fullname+"'></td><td> <input class='form-control' type='date'  name='ch_mem_cdn_bday"+ch_mem_cdn_table_len+"' value='"+new_ch_mem_cdn_bday+"'></td><td> <select class='form-control' name='ch_mem_cdn_cstatus"+ch_mem_cdn_table_len+"'><option value='"+new_ch_mem_cdn_cstatus+"'>"+new_ch_mem_cdn_cstatus+"</option><option value='Single'>Single</option><option value='Married'>Married</option><option value='Widow/er'>Widow/er</option><option value='Single Parent'>Single Parent</option><option value='Separated'>Separated</option><option value='Annulled'>Annulled</option></select></td><td></td></tr>";
 
 document.getElementById("new_ch_mem_cdn_fullname").value="";
 document.getElementById("new_ch_mem_cdn_bday").value="";
 document.getElementById("new_ch_mem_cdn_cstatus").value="Single";
}

//church member educ attain

function ch_mem_educ_delete_row()
{
 var ch_mem_educ_table=document.getElementById("ch_mem_educ_data_table");
 var no =(ch_mem_educ_table.rows.length)-3;

 document.getElementById("ch_mem_educ_row"+no+"").outerHTML="";
}

function add_new_ch_mem_educ()
{
	
 var new_ch_mem_educ_school=document.getElementById("new_ch_mem_educ_school").value;
 var new_ch_mem_educ_year=document.getElementById("new_ch_mem_educ_year").value;
 var new_ch_mem_educ_course=document.getElementById("new_ch_mem_educ_course").value;
	
 var ch_mem_educ_table=document.getElementById("ch_mem_educ_data_table");
 var ch_mem_educ_table_len=(ch_mem_educ_table.rows.length)-2;

 var ch_mem_educ_row = ch_mem_educ_table.insertRow(ch_mem_educ_table_len+1).outerHTML="<tr id='ch_mem_educ_row"+ch_mem_educ_table_len+"'><td> <input class='form-control' type='text'  name='ch_mem_educ_school"+ch_mem_educ_table_len+"' value='"+new_ch_mem_educ_school+"'></td><td> <input class='form-control' type='text'  name='ch_mem_educ_year"+ch_mem_educ_table_len+"' value='"+new_ch_mem_educ_year+"'></td><td> <input class='form-control' type='text'  name='ch_mem_educ_course"+ch_mem_educ_table_len+"' value='"+new_ch_mem_educ_course+"'></td><td></td></tr>";
 
 document.getElementById("new_ch_mem_educ_school").value="";
 document.getElementById("new_ch_mem_educ_year").value="";
 document.getElementById("new_ch_mem_educ_course").value="";
}

//church member trainings

function ch_mem_train_delete_row()
{
 var ch_mem_train_table=document.getElementById("ch_mem_train_data_table");
 var no =(ch_mem_train_table.rows.length)-3;

 document.getElementById("ch_mem_train_row"+no+"").outerHTML="";
}

function add_new_ch_mem_train()
{
	
 var new_ch_mem_train_name=document.getElementById("new_ch_mem_train_name").value;
 var new_ch_mem_train_year=document.getElementById("new_ch_mem_train_year").value;
 var new_ch_mem_train_title=document.getElementById("new_ch_mem_train_title").value;
	
 var ch_mem_train_table=document.getElementById("ch_mem_train_data_table");
 var ch_mem_train_table_len=(ch_mem_train_table.rows.length)-2;

 var ch_mem_train_row = ch_mem_train_table.insertRow(ch_mem_train_table_len+1).outerHTML="<tr id='ch_mem_train_row"+ch_mem_train_table_len+"'><td> <input class='form-control' type='text'  name='ch_mem_train_name"+ch_mem_train_table_len+"' value='"+new_ch_mem_train_name+"'></td><td> <input class='form-control' type='text'  name='ch_mem_train_year"+ch_mem_train_table_len+"' value='"+new_ch_mem_train_year+"'></td><td> <input class='form-control' type='text'  name='ch_mem_train_title"+ch_mem_train_table_len+"' value='"+new_ch_mem_train_title+"'></td><td></td></tr>";
 
 document.getElementById("new_ch_mem_train_name").value="";
 document.getElementById("new_ch_mem_train_year").value="";
 document.getElementById("new_ch_mem_train_title").value="";
}