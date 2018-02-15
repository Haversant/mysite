<div class="drowa">
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
	<div class="colim">
		<img class="vibox" src="/img/gallery/1.jpg">
	</div>
</div>

<script type="text/javascript">


window.onload =function (){
	var bg,div,pic,src,imgs,created;

	function viCreate(){
		
		bg = document.createElement('div');
		document.body.appendChild(bg);
		bg.className = 'vi_bg';

		div = document.createElement('div');
		document.body.appendChild(div);
		div.className = 'vi_div';
		
		pic = document.createElement('img');
		div.appendChild(pic);
		pic.className = 'vi_pic';
		created = true;

		bg.addEventListener("click",viClose);
		div.addEventListener("click",viClose);
		pic.addEventListener("click",function(){event.stopPropagation();});
	}
	function viOpen(){
		if(!created){
			viCreate();
		}
		bg.style.display = "block";
		div.style.display = "block";

		src = this.getAttribute('Src');
		pic.setAttribute('Src',src);
	}
	function viClose(){
		bg.style.display = "none";
		div.style.display = "none";
		pic.removeAttribute('Src');
	}

	imgs = document.getElementsByClassName('vibox');
	for (i = 0; i < imgs.length; i++) {
		imgs[i].addEventListener("click",viOpen);
	}
};
</script>