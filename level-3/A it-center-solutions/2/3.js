function solve(x) {
	x = x + "";
	if (Number(x[x.length - 3]) === 7) {
		console.log('true: ' + x);
	}
	else {
		console.log('false: ' + x);
	}
}

solve(123756);
solve(1232342432756);
solve(756);

solve(2126);
solve(244476);
solve(24447);
solve(4471234);
solve(447234);
solve(4);