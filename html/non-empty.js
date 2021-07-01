function required()
{
var empt = document.forms["userRegistration"]["name"]["phonenumber"]["emailid"]["password"].value;
if (empt == "")
{
alert("Please input a Value");
return false;
}
else 
{
alert('Code has accepted : you can try another');
return true; 
}
}
