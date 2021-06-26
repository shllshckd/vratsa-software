function solve(x,y,z) 
{
	var a = [x,y,z];
	a.sort((a, b) =>  b - a);
	console.log(a[0]);
}

solve(1,2,3);
solve(2,7,222);
solve(3, 0, -1);
solve(4, 1, 1111);