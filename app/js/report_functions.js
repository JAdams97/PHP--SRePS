function generateMonth()
{
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	for (var i = 0; i < months.length; i++)
	{
		$('<option/>').val(months[i]).html(months[i]).appendTo('#mp-month');
	}
}

function generateYear()
{
	var year = new Date().getFullYear();
	var offset = 1970;

	for (var i = year - offset; i >= 0; i--)
	{
		var option = "<option value=" + (i + offset) + ">" + (i + offset) + "</option>";
		$("#mp-year").append(option);
	}
}

$(document).ready(function()
{
	$('#month-area').hide();

	generateMonth();
	generateYear();

	var period = null;

	$('#month').click(function()
	{
		period = "monthly";
		$('#month-area').show();
	});
});