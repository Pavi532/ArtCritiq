$dash_url = 'http://dev.artcritiq.com//admin/'

$(document).ready(function(){
    $('#dashmini').load($dash_url+'dash_page.php');
    $('#studentFn a').click(function(){
        var spage =$(this).attr('href');
        $('#dashmini').load($dash_url+spage+".php");
        return false;
    });
    $('#courseFn a').click(function(){
        var cpage =$(this).attr('href');
        $('#dashmini').load($dash_url+cpage+".php");
        return false;
    });
    $('#dash').click(function(){
        var spage =$(this).attr('href');
        $('#dashmini').load($dash_url+"dash_page.php");
        return false;
    });
});