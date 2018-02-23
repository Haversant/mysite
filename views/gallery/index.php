<div class="drowa">
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/2.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/3.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/4.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/5.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/6.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/7.jpg">
	</div>
</div>


<!-- <script src="http://code.jquery.com/jquery-1.8.3.js"></script> -->
<script type="text/javascript">

window.onload = viboxJS;

/*function viboxJQ(){
	
	$('img').click(vibox1);
	function vibox1(){
		var friends = 'img.'+ $(this).attr( 'class' );
		$(friends).each(ea);
		function ea(i,item){
			
		}
	}
}*/

function viboxJS(){
	var bg,div,pic,bp,bn,src,imgs,created,pr,ne;

	function viCreate(){
		
		bg = document.createElement('div');
		document.body.appendChild(bg);
		bg.className = 'vi_bg';

		div = document.createElement('div');
		document.body.appendChild(div);
		div.className = 'vi_div';
		
		/*pic = document.createElement('div');
		div.appendChild(pic);
		pic.className = 'vi_pic';*/

		bp = document.createElement('div');
		div.appendChild(bp);
		bp.className = 'vi_bp';
		bn = document.createElement('div');
		div.appendChild(bn);
		bn.className = 'vi_bn';
		created = true;

		bg.addEventListener("click",viClose);
		div.addEventListener("click",viClose);
		bp.addEventListener("click",function(){event.stopPropagation();viOpen(pr,imgs);});
		bn.addEventListener("click",function(){event.stopPropagation();viOpen(ne,imgs);});
		/*pic.addEventListener("click",function(){event.stopPropagation();});*/

	}
	function viNext(){

	}
	function viOpen(im,imgs){
		
		for (i = 0; i < imgs.length; i++) {
			if(imgs[i]==im){
				if(i!=0){
					pr = imgs[i-1];
				}else{
					pr = imgs[imgs.length-1];
				}
				if(i!=imgs.length-1){
					ne = imgs[i+1];
				}else{
					ne = imgs[0];
				}
			}
		}

		if(!created){
			viCreate();
		}
		bg.style.display = "block";
		div.style.display = "block";

		src = im.getAttribute('Src');
		div.style.backgroundImage = 'url("'+src+'")';
		/*pic.setAttribute('Src',src);*/
	}
	function viClose(){
		bg.style.display = "none";
		div.style.display = "none";
		div.style.backgroundImage = '';
		/*pic.removeAttribute('Src');*/
	}

	imgs = document.getElementsByClassName('vibox');
	for (i = 0; i < imgs.length; i++) {
		imgs[i].addEventListener("click",function (){
			viOpen(this,imgs);
		});
	}
}
</script>