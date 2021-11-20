function strToNum(str) {
	if (str.trim() == '') {
		console.log('empty string!');
	} 
    else if (!str.match(/[0-9]/g)) {
		console.log('no numbers!');
	} 
    else {
		var elements = str.split(' ');
		var output = [];

		for (var i = 0; i < elements.length; i++) {
			if (elements[i].match(/[0-9]/g) && output.indexOf(elements[i]) == -1)  {
				output.push(elements[i]);
			}
		}

		console.log(output);
	}
}

strToNum('0 0 0 0 0');