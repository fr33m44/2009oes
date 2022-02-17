function check_teacher_pass()
{ 	
	var tpass_new1=document.forms[0].tpass_new1.value;
	var tpass_new2=document.forms[0].tpass_new2.value;
	  
	if(tpass_new1 != tpass_new2)
	{
		alert("密码不匹配，请重新输入。"); 
		return false;	
	}
	else 
	{
		
		document.teacher_modify_form.tid.disabled=   !document.teacher_modify_form.tid.disabled;   
		document.teacher_modify_form.tname.disabled=   !document.teacher_modify_form.tname.disabled;   
		document.teacher_modify_form.tpass.disabled=   !document.teacher_modify_form.tpass.disabled; 	
		document.teacher_modify_form.t_did.disabled=   !document.teacher_modify_form.t_did.disabled; 	
		return true;
		
	}
}
function check_student_pass()
{ 
		//document.student_modify_form.s_did.disabled=!document.student_modify_form.s_did.disabled;
		return true; 
}

function check_admin_pass()
{ 	
	var apass_new1=document.forms[0].apass_new1.value;
	var apass_new2=document.forms[0].apass_new2.value;
	  
	if(apass_new1 != apass_new2)
	{
		alert("密码不匹配，请重新输入。"); 
		return false;	
	}
	else 
	{
		
		document.admin_modify_form.tid.disabled=   !document.admin_modify_form.tid.disabled;   
		document.admin_modify_form.tname.disabled=   !document.admin_modify_form.tname.disabled;   
		document.admin_modify_form.tpass.disabled=   !document.admin_modify_form.tpass.disabled;  
		return true;
		
	}
}