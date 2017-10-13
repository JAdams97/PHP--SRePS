// $.getScript('simple-statistics.min.js', function()
// {
// }

function groupItems(array)
{
	var groups = {};
			
	for (var i = 0; i < array.length; i++)
	{
		var groupID = array[i].id;
		
		if (!groups[groupID])
		{
			groups[groupID] = [];
		}

		groups[groupID].push(array[i].quantity);
	}
	
	result = [];

	for (var groupID in groups)
	{
		array.push({id: groupID, quantity: groups[groupID]});
	}

	return result;
}



function groupItems(array, key)
{
	return array.reduce(function (r, a) {
		r[a.key] = r[a.key] || [];
		r[a.key].push(a);
		return r;
	}, Object.create(null));
}

function getDaysInMonth(month, year)
{
	return 
}

function generateObjects(array)
{
	var groups = new Array();
	for (var i = 0; i < array.length; i++) {
		var groupName = array[i].group;
		if (!groups[groupName]) {
			groups[groupName] = [];
		}
		groups[groupName].push(array[i][1]);
	}
	myArray = [];
	for (var groupName in groups) {
		myArray.push({group: groupName, color: groups[groupName]});
	}
}

function getSalesByDay(array)
{
	for (var j = 0; j < monthDays; j++)
	{
		if (parseInt(day[cCounter] - 1) === j)
		{
			linearData[j] = new Array(j, 0);
			while (parseInt(day[cCounter + fCounter] - 1) === j)
			{
				linearData[j][1] += parseInt(quantity[cCounter + fCounter]);
				fCounter++;
			}
			cCounter = cCounter + fCounter;
			fCounter = 0;
		}
		else
		{
			linearData[j] = new Array(j, 0);
		}
	};
}

function graphSalesForItem(array, maxID, year, month)
{
	var result = new Array();
	var monthDays = getDaysInMonth(month + 1, year);
	var cCounter = 0;
	var fCounter = 0;

	for (var i = 0; i < maxID; i++)
	{
		if((array[i][0]) === i + 1)
		{
			for(var j = 0; j < maxID; i++)
			{
				result[i] = new Array(array[i][j]);
			}
		}
	}

	alert(result[0][0]);
	

	return linearData;
}

function filterID(array)
{
	var seen = {};
	
	return array.filter(function(item)
	{
		return seen.hasOwnProperty(item) ? false : (seen[item] = true);
	});
}

function filterName()

function showResults()
{
	$('#forecast-result').show();
}

function getMaxID(array)
{
	var result = 0;

	for (var i = 0; i < array.length; i++)
	{
		if (array[i][0] > result)
		{
			result = array[i][0];
		}
	}

	return result;
}

function predictSales()
{
	var date = new Date();
	var month = date.getMonth();
	var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var year = date.getFullYear();

	$('#fItemCurrent').text(monthNames[month] + " Sales (" + year + ")");

	if (month === 11)
	{
		$('#fItemFuture').text(monthNames[0] + " Sales (" + (year + 1) + ")");
	}
	else
	{
		$('#fItemFuture').text(monthNames[month + 1] + " Sales (" + year + ")");
	}

	$.ajax(
	{
		url: 'test.php',
		type: 'POST',
		data: {'month': month, 'year': year},
		success: function(response, statusText)
		{
			data = jQuery.parseJSON(response);

			var monthDays = new Date(year, month + 1, 0).getDate();
			var linearData = new Array();
			var cCounter = 0;
			var fCounter = 0;

			for (var j = 0; j < monthDays; j++)
			{
				if (data.items[cCounter].day - 1 === j)
				{
					alert(data.items[j].day - 1);
					linearData[j] = new Array(j, 0);

					// while (data.items[aCounter].day - 1 === j)
					// {
					// 	var aCounter = cCounter + fCounter;
					// 	linearData[j][1] += data.items[aCounter].quantity;
					// 	fCounter++;

					// }
					alert(linearData);
					cCounter = cCounter + fCounter;
					fCounter = 0;
				}
				else
				{
					linearData[j] = new Array(j, 0);
				}
			};

			alert(linearData);

			var groups = {};
			
			for (var i = 0; i < data.items.length; i++)
			{
				var groupID = data.items[i].id;
				
				if (!groups[groupID])
				{
					groups[groupID] = [];
				}

				groups[groupID].push(data.items[i].quantity);
			}
			
			var itemsData = [];

			for (var groupID in groups)
			{
				itemsData.push({id: groupID, quantity: groups[groupID]});
			}


			for (var j = 0; i < data.items.length; i++)
			{
				var id = data.output[i].split(' ')[0];
				var name = data.output[i].split(' ')[1];
				var day = data.output[i].split(' ')[2];
				var quantity = data.output[i].split(' ')[3];

				items[i] = new Array(id, name, day, quantity);
			};


			generateObjects(items);

			var itemData = new Array();
			maxItemID = getMaxID(items);

			for (var j = 0; j < maxItemID; j++)
			{
				for(var k = 0; k < items.length; i++)
				{
					if(items[k][0] === j + 1)
					{
						itemData[j] = new Array(items[j][1], items[j][2], items[j][3]);
					}
				}
			};

			alert(itemData);

			jQuery.getScript("js/simple-statistics.min.js", function()
			{
				

				var outReg = ss.linearRegression(linearData).b;

				var output = null;

				for (var k = 0; k < outID.length; k++)
				{
				}
				var content = "<tr><td>" + outID + "</td><td>" + outName + "</td><td>" + outQuantity + "</td><td>" + outReg + "</td></tr>";
				$('#forecast-table').append(content);
			});
		},
		error: function(response, statusText)
		{
			$('#forecast-table').append(statusText);
		}
	});
}

$(document).ready(function()
{
	$.getScript('js/simple-statistics.min.js', function()
	{
		$('#forecast-result').hide();

		var type = null;

		$('#month').click(function()
		{
			type = "monthly";
		});

		$('#week').click(function()
		{
			type = "weekly";
		});

		$('#pre-button').click(function()
		{
			predictSales();
			showResults();
		});
	});
});