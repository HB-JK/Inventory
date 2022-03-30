<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="demo"></div>
<script>
	var response = [
		{
			'name' : 'hansent',
			'status' : 'hadir',
			'count' : '2'
		},
		{
			'name' : 'hansent',
			'status' : 'izin',
			'count' : '0'
		},
		{
			'name' : 'alex',
			'status' : 'hadir',
			'count' : '2'
		},
		{
			'name' : 'alex',
			'status' : 'sakit',
			'count' : '1'
		},
		{
			'name' : 'alex',
			'status' : 'izin',
			'count' : '1'
		},
		{
			'name' : 'hansent',
			'status' : 'sakit',
			'count' : '1'
		},
	];

	var names = [];

	for(let i = 0; i < response.length; i++){
		names.push(response[i].name);
	}

	var uniq = [... new Set(names)];

	var arr = [];

	for(let i = 0; i < uniq.length; i++){
		for(let k = 0; k < response.length; k++){
			if(uniq[i] == response[k].name){
				arr.uniq[i].push(response[k].status);
				arr.uniq[i].push(response[k].count);
			}
		}
	}

	document.getElementById('demo').innerHTML = arr[0];

	
</script>
</body>
</html>