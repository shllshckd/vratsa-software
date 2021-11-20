//
function solve(x,y,z) 
{
	var tmp = 0;
	while (!(x>y>z)){
		if (y > x) {
			tmp = x;
			x=y
			y = tmp;
		}
		if(z > y) {
			tmp  = z
			y=z;
			z=tmp	
		}
	}
	console.log(x,y,z);
}

solve('5', '1', '2');