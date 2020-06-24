$(document).ready(function()
{
    //botao de criar um novo post
    var homebtnCreate = document.getElementById('casa_create_post');
    //container de criar o post
    var homecontainerpost = document.getElementById('casa_create_include');
    //main container da pagina
    var homemainbody = document.getElementById('casa_main');


    homebtnCreate.onclick=function()
    {
        if(homecontainerpost.style.display=="block")
        {
            homecontainerpost.style.display="none"; 
            homecontainerpost.style.transition="2s"; 
            homemainbody.style.marginTop="2%"; 
        }
        else
        {
            homecontainerpost.style.display="block";
            homecontainerpost.style.transition="2s";  
            homemainbody.style.marginTop="0% ";
        }



    }


});