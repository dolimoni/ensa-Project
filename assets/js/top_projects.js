$('#e_top_project_by_cat .e_categories li').click(function (e){
    $('#e_top_project_by_cat .e_categories li').removeClass('active');
    $(this).addClass('active');
    var index = $('#e_top_project_by_cat .e_categories li').index($(this))+2;
    $('#e_top_project_by_cat .e_project_show > div:not(.e_see_all)').addClass('hidden_project');
    $('#e_top_project_by_cat .e_project_show > div').removeClass('active_project');
    $('#e_top_project_by_cat .e_project_show > div:nth-child('+index+')').removeClass('hidden_project');
    
    e.preventDefault();
});