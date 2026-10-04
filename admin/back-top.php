<button id="backToTop" class="btn btn-primary rounded-circle"
style="position:fixed;right:25px;bottom:25px;width:45px;height:45px;display:none;z-index:999;">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    //==========================
// Back To Top
//==========================

const topBtn=document.getElementById("backToTop");

window.addEventListener("scroll",()=>{

topBtn.style.display=window.scrollY>300?"block":"none";

});

topBtn.onclick=function(){

window.scrollTo({

top:0,

behavior:"smooth"

});

};
</script>