// JavaScript Document

function delete_confirm()
{
var r=confirm("Are you sure you want to delete??");
if (r==true)
  {
  alert("Item will be deleted.");
  }
else
  {
  alert("Request has been cancelled.");
  return false;
  }
}